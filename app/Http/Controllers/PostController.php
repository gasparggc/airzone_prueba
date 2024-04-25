<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Services\PostService;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService){
        $this->postService = $postService;
    }
    
    public function post_activity($id){

        $response = $this->postService->post_activity($id);

        return response()->json([
            'body' => $response 
        ]);
    }
}
