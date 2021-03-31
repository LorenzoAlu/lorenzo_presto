<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
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
}
