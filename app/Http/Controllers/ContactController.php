<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Mail\ContactMailSeller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function workWithUsPage()
    {
        return view('contacts.workWithUsPage');
    }
    
    public function workWithUs(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $body = $request->input('body');
        $content = compact('name', 'email', 'body');
        
        Mail::to('revisor@revisor.it')->send(New ContactMail($content));
        return redirect()->back()->with('message', "La mail è stata inviata");
    }
    
    public function contactSeller(Request $request, Announcement $announcement)
    {   
        if(Auth::user() == null)
        {
            return redirect()->back()->with('message', "Registrati per poter inviare il messaggio al venditore: {$announcement->user->name} ");
        }
        
        $name = $request->input('name');
        $email = $request->input('email');
        $body = $request->input('body');
        $content = compact('name', 'email', 'body');
        
        Mail::to($announcement->user->email)->send(New ContactMailSeller($content));
        return redirect()->back()->with('message', "La mail è stata inviata al venditore {$announcement->user->name} ");
        
        
        
    }
}
