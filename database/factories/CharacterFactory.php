<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Character>
 */
class CharacterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'name' => fake()->name(),
            'role' => fake()->randomElement(['Protagonist', 'Antagonist', 'Supporting', 'Extra']),
            'identity'    => fake()->sentence(),
            'background'  => fake()->paragraph(),
            'development' => fake()->paragraph(),
            'description' => fake()->paragraph()
        ];
    }
}
