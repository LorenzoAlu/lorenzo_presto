<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\AnnouncementImage;
use App\Jobs\GoogleVisionLabelImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Jobs\GoogleVisionSafeSearchImage;
use App\Http\Requests\AnnouncementRequest;
use App\Jobs\GoogleVisionRemoveFaces;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = Announcement::where('is_accepted', true)->orderBy('id', 'desc')->paginate(6);
        return view('announcements.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(Auth::user()->disable == true){
            return redirect()->back()->with('message', "Utente bloccato, non puoi inserire annunci");
        }

        $uniqueSecret = request()->old('uniqueSecret', base_convert(sha1(uniqid(mt_rand())),16,36));
        
        return view('announcements.create', compact('uniqueSecret'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnnouncementRequest $request)
    {
       
        $announcement = Announcement::create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'category_id' => $request->input('category_id'),
            'user_id' => Auth::id(),
            'price' => $request->input('price')
        ]);

        $uniqueSecret = $request->input('uniqueSecret');

        $images = session()->get("images.{$uniqueSecret}", []);
        $removedImages = session()->get("removedimages.{$uniqueSecret}", []);

        $images = array_diff($images, $removedImages);

        foreach ($images as $image) {
            $i = new AnnouncementImage();
            $fileName = basename($image);
            $newFileName = "public/announcements/{$announcement->id}/{$fileName}";
            Storage::move($image, $newFileName);
            // dispatch(new ResizeImage(
            //     $newFileName,
            //     300,
            //     150
            // ));
            
            // dispatch(new ResizeImage(
            //     $newFileName,
            //     400,
            //     300
            // ));

            // dispatch(new ResizeImage(
            //     $newFileName,
            //     120,
            //     120
            // ));

            $i->file = $newFileName;
            $i->announcement_id = $announcement->id;
            $i->save();
            GoogleVisionSafeSearchImage::withChain([
                new GoogleVisionLabelImage($i->id),
                new GoogleVisionRemoveFaces($i->id),
                new ResizeImage($i->file,300,150),
                new ResizeImage($i->file,400,300),
                new ResizeImage($i->file,120,120),
            ])->dispatch($i->id);

        }

        File::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));

        return redirect(route('home'))->with('message', "L'annuncio $announcement->title è stato creato con successo");

    }

    public function uploadImages(Request $request)
    {
        $uniqueSecret = $request->input('uniqueSecret');
        $fileName = $request->file('file')->store("public/temp/{$uniqueSecret}");

        dispatch(new ResizeImage(
            $fileName,
            120,
            120
        ));

        session()->push("images.{$uniqueSecret}", $fileName);

        return response()->json([
            'id'=>$fileName
        ]);
    }

    public function removeImages(Request $request)
    {
        $uniqueSecret = $request->input('uniqueSecret');

        $fileName = $request->input('id');
        session()->push("removedimages.{$uniqueSecret}", $fileName);

        Storage::delete($fileName);
        return response()->json('ok');
    }

    public function getImages(Request $request)
    {
        $uniqueSecret = $request->input('uniqueSecret');
        $images = session()->get("images.{$uniqueSecret}", []);
        $removedImages = session()->get("removedimages.{$uniqueSecret}", []);
        $images = array_diff($images, $removedImages);
        $data = [];

        foreach ($images as $image) {
            $data[]=[
                'id' => $image,
                'src' => AnnouncementImage::getUrlByFilePath($image,120,120)
            ];
        }

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        $likes= $announcement->likes()->get();
        $liked = false;
        foreach($likes as $like){
            if($like->user_id == Auth::id()){
                $liked= true;
                break;
            }
        }
        return view('announcements.show', compact('announcement','liked'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        if(Auth::user()->disable == true){
            return redirect()->back()->with('message', "Utente bloccato, non puoi modificare annunci");
        }
        $categories=Category::all();
        $uniqueSecret = request()->old('uniqueSecret', base_convert(sha1(uniqid(mt_rand())),16,36));

        return view('announcements.edit', compact('categories', 'announcement','uniqueSecret'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        $announcement->update($request->all());
        $announcement->is_accepted = null;
        $announcement->save();
        $uniqueSecret = $request->input('uniqueSecret');

        $images = session()->get("images.{$uniqueSecret}", []);
        $removedImages = session()->get("removedimages.{$uniqueSecret}", []);

        $images = array_diff($images, $removedImages);

        foreach ($images as $image) {
            $i = new AnnouncementImage();
            $fileName = basename($image);
            $newFileName = "public/announcements/{$announcement->id}/{$fileName}";
            Storage::move($image, $newFileName);
            
            $i->file = $newFileName;
            $i->announcement_id = $announcement->id;

            $i->save();

            GoogleVisionSafeSearchImage::withChain([
                new GoogleVisionLabelImage($i->id),
                new GoogleVisionRemoveFaces($i->id),
                new ResizeImage($i->file,300,150),
                new ResizeImage($i->file,400,300),
                new ResizeImage($i->file,120,120),
            ])->dispatch($i->id);

        }

        File::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));
        return redirect(route('users.profile'))->with('message', "L' articolo $announcement->title è stato modificato correttamente.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
        return redirect()->back()->with('message', "L' articolo $announcement->title è stato cancellato con successo.");
    }

    public function addLiked(Announcement $announcement ){

        if(Auth::user() == null){
            return redirect()->back()->with('message',"Devi essere loggato !");
        }
        $like= Like::create([
            'announcement_id'=> $announcement->id,
            'user_id'=>Auth::id(),
        ]);
   
        return redirect()->back()->with('message','Aggiunto ai preferiti'); 
    }

    public function lessLiked(Announcement $announcement ){

        $like = $announcement->likes()->where('user_id', '=', Auth::id())->delete();


        return redirect()->back()->with('message','tolto dai preferiti');
    }

    public function destroyImage(AnnouncementImage $image)
    {
        $image->delete();
        return redirect()->back();
    }
 
}

