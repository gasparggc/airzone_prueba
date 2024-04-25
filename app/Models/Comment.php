<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Post;

class Comment extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function writer(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function search_by_post_id($post_id){

        $comment = Comment::where('post_id', $post_id)->get();

        return $comment;
    }
}
