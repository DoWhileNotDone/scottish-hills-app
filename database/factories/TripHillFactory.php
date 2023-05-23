<?php

namespace Database\Factories;

use App\Models\Hill;
use App\Models\User;
use App\Models\UserTrip;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TripHill>
 */
class TripHillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_trip_id' => UserTrip::factory([
                'user_id'  => User::factory(),
            ]),
            'hill_id'      => Hill::factory(),
        ];
    }
}
