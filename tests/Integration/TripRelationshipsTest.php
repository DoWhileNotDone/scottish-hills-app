<?php

namespace Tests\Integration;

use App\Models\TripHill;
use App\Models\User;
use App\Models\Trip;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use Tests\TestCase;

class TripRelationshipsTest extends TestCase
{
    use RefreshDatabase;

    public function test_trip_has_user(): void
    {
        $trip = Trip::factory()
            ->hasTripHills(3)
            ->create();

        $this->assertInstanceOf(User::class, $trip->user);
    }

    public function test_trip_has_hills(): void
    {
        $trip = Trip::factory()
            ->hasTripHills(3)
            ->create();

        $this->assertInstanceOf(Collection::class, $trip->hills);

        $this->assertEquals(3, $trip->hills->count());
    }
}
