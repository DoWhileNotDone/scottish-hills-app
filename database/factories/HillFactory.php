<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hill>
 */
class HillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'     => fake()->name(),
            'type'     => fake()->randomElement(['MUNRO']),
            'grid_ref' =>
                          fake()->randomElement(['NH', 'NM', 'NC', 'NJ', 'NO']) .
                          fake()->randomNumber(6, true),
            'height'   => fake()->numberBetween(3000, 4409),
        ];
    }
}
