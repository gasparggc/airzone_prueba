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

        $post = $this->post->search($id);
        $comments = $this->comment->search_by_post_id($id);

        foreach($comments as $comment){
            $comentarios[] = array(
                'wirter' => $comment->writer->username,
                'comment' => $comment->content
            );
        }

        $response = array(
            'post' => [
                'id' => $post->id,
                'title' => $post->title,
                'short_content' => $post->short_content,
                'owner' => $post->owner->username,
                'comments' => $comentarios
            ],
        );

        return $response;
    }
}