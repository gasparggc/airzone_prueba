<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1,10),
            'title' => fake()->word(),
            'slug' => fake()->word(),
            'picture' => fake()->imageUrl($width = 640, $height = 480),
            'short_content' => fake()->text(),
            'content' => fake()->paragraph(),
            'added' =>fake()->dateTimeBetween('-1 week', 'now'),
            'updated' => fake()->dateTimeBetween('now','+1 week'),
            'comment' => fake()->numberBetween(0,1),
            'pending' => fake()->numberBetween(0,1),
            'public' => fake()->numberBetween(0,1),
            'active' => fake()->numberBetween(0,1),
        ];
    }
}
