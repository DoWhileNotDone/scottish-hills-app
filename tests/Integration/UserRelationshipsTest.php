<?php

namespace Tests\Integration;

use App\Models\Hill;
use App\Models\User;
use App\Models\Trip;
use App\Models\TripHill;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use Tests\TestCase;

class UserRelationshipsTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_has_trips(): void
    {
        $user = User::factory()
        ->hasTrips(3)
        ->create();

        $this->assertInstanceOf(Collection::class, $user->trips);

        $this->assertEquals(3, $user->trips->count());
    }

    public function test_user_has_hills(): void
    {
        //User Has two trips, each trip has three hills
        $user = User::factory()
            ->has(
                Trip::factory()
                    ->has(
                        TripHill::factory()
                            ->count(3)
                            ->state(function (array $attributes, Trip $trip) {
                                return ['user_id' => $trip->user];
                            }),
                    )
                    ->count(2)
            )
            ->create();

        $this->assertInstanceOf(Collection::class, $user->trips);

        $this->assertEquals(2, $user->trips->count());

        $this->assertInstanceOf(Collection::class, $user->hills);

        $this->assertEquals(6, $user->hills->count());
    }
}
