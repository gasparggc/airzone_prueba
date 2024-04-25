<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Post;

class PostTest extends TestCase
{

    public function test_post_activity(){
        $random_number = 1;

        $response = $this->get('/api/posts/activity/'.$random_number);

        $this->assertDatabaseHas('categories', ['id' => $random_number]);
        $response->assertStatus(200);
    }
}
