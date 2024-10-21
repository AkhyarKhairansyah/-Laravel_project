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
           'user_id' => 1,  // Added a comma here
           'title' => fake()->sentence(10),
           'body' => fake()->paragraph(20)  // Removed the space before '->'
        ];
    }
}
