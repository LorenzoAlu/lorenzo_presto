<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use App\Models\Category;

use Laravel\Scout\Searchable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Announcement extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title', 'body', 'category_id', 'user_id', 'price'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    static public function ToBeRevisionedCount()
    {
        return Announcement::where('is_accepted', null)->count();
    }

    public function toSearchableArray()
    {
        $array = [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
        ];


        return $array;
    }

    
    public function DoYouLikeIt()
    {
        $like = $this->likes()->where('user_id', '=', Auth::id())->get();

            if(count($like) == 1){
                return  false;
            } 
        
        return true;
    }
}
