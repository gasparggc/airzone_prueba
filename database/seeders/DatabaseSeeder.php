<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    //En este archivo se encuentran los seeder para rellenar todas las tablas haciendo uso de las relaciones entre modelos.
    public function run(): void
    {

        $user = User::factory()
        ->count(10)
        ->has(Comment::factory()->count(3))
        ->create();

        $post = Post::factory()
        ->has(Category::factory()->count(2))
        ->create();

        $category = Category::factory()
        ->count(1)
        ->has(Post::factory()->count(3))
        ->create();
    }
}
