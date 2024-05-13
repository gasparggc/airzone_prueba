<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function postComments(){
        return $this->hasManyThrough(User::class, Comment::class);
    }

    public function post_activity($id){

        $post = Post::with('comments.writer')->find($id);

        return $post;
    }
}
