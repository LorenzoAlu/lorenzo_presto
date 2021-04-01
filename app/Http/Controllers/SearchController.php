<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request) {
        $q = $request-> input('q');
        $announcements = Announcement::search($q)->where('is_accepted', true)->get();
        return view ('announcements.search', compact('announcements','q'));
    }
}
