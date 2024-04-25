<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Comment;

class CategoryTest extends TestCase
{

    public function test_index_category(){
        $response = $this->get('/api/categories/find');

        $response->assertStatus(200);
    }

    public function test_store_category(){

        $name = fake()->word();
        $slug = fake()->word();

        $datos = [
            'name' => $name,
            'slug' => $slug
        ];
        $response = $this->postJson('/api/categories/new_category', $datos);

        $this->assertDatabaseHas('categories', $datos);

        $response->assertStatus(200);
    }

    public function test_show_category(){

        $random_number = fake()->numberBetween(1,10);

        $response = $this->get('/api/categories/find_category/'.$random_number);

        $this->assertDatabaseHas('categories', ['id' => $random_number]);
        $response->assertStatus(200);
    }

    public function test_update_category(){

        $random_number = fake()->numberBetween(1,10);

        $name = fake()->word();
        $slug = fake()->word();

        $datos = [
            'name' => $name,
            'slug' => $slug,
            'visible' => fake()->numberBetween(0,1),
        ];
        $response = $this->postJson('/api/categories/update_category'.$random_number, $datos);

        $this->assertDatabaseHas('categories', $datos);

        $response->assertStatus(200);
    }

    public function test_destroy_category(){
        $response = $this->get('/api/categories/delete_category');

        $random_number = fake()->numberBetween(1,10);

        $response = $this->deleteJson('/api/categories/delete_category'.$random_number);

        $this->assertDatabaseMissing('categories', ['id' => $random_number]);

        $response->assertStatus(200);
    }
}
