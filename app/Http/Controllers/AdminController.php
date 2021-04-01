<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        $users=User::orderBy('id','desc')->paginate(5);
        $announcements=Announcement::orderBy('id','desc')->paginate(5);
        $totalAnnouncements=count(Announcement::all());
        $totalUsers=count(User::all());
        
        return view('admin.dashboard', compact('users', 'announcements','totalAnnouncements','totalUsers'));
    }

    public function toggleUser(User $user)
    {
        $user->is_revisor = !$user->is_revisor;
        $user->save();

        if($user->is_revisor == true){
            return redirect()->back()->with('message',"l'utente $user->name ora è revisore");
        }else{
            return redirect()->back()->with('message',"l'utente $user->name non è più revisore");
        }
    }
    public function destroyUser(User $user)
        {
            $user->delete();

            return redirect()->back()->with('message',"L'utente $user->name è stato eliminato");
        }

    public function toggleUserDisable(User $user)
        {
            $user->disable = !$user->disable;
            $user->save();
    
            return redirect()->back();
        }
}

