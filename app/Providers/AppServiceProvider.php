<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(Schema::hasTable('categories','announcements')){
            $categories = Category::all();
            $announcements = Announcement::all();
            foreach ($announcements as $announcement) {
                $likes= $announcement->likes()->get();
                $liked = false;
                foreach($likes as $like){
                if($like->user_id == Auth::id()){
                    $liked= true;
                    break;
                }
            }
        }


            View::share(compact('categories','liked','likes','announcements'));
        }

        Paginator::useBootstrap();
       
    }
}
