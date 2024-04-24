<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'post_id' => fake()->numberBetween(1,50),
            'user_id' => fake()->numberBetween(1,10),
            'content' => fake()->text(),
            'datetime' =>fake()->dateTimeBetween('now', '+2 days'),
        ];
    }
}