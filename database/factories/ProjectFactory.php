<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [ 
            'user_id' => User::factory(),

            'penname' => fake()->name(),
            'title' => fake()->sentence(3),
            'outline' => fake()->paragraph(),
            'genre' => fake()->randomElement(['fiction', 'mystery', 'romance', 'sci-fi']),
            'book_link' => fake()->url(),
            //
        ];
    }
}
