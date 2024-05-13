<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Comment;

class PostService
{
    protected $post;
    protected $comment;

    public function __construct(){
        
        $this->post = new Post;
        $this->comment = new Comment;
    }

    public function post_activity($id){

        $post = $this->post->post_activity($id);
        
        return $post;
    }
}