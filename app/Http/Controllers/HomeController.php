<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $announcements = Announcement::where('is_accepted', true)->orderBy('id', 'desc')->take(5)->get();
        return view('home', compact('announcements'));
    }

    public function profile()
    {
        $user=Auth::user();
        return view('users.profile', compact('user'));
    }
}
