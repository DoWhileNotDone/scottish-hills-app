<?php

namespace Tests\Integration;

use App\Models\Hill;
use App\Models\Trip;
use App\Models\TripHill;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use Tests\TestCase;

class TripHillRelationshipsTest extends TestCase
{
    use RefreshDatabase;

    public function test_trip_hill_has_user(): void
    {
        $tripHill = TripHill::factory()->create();

        $this->assertInstanceOf(User::class, $tripHill->user);
    }

    public function test_trip_hill_has_hill(): void
    {
        $tripHill = TripHill::factory()->create();

        $this->assertInstanceOf(Hill::class, $tripHill->hill);
    }

    public function test_trip_hill_has_trip(): void
    {
        $tripHill = TripHill::factory()->create();

        $this->assertInstanceOf(Trip::class, $tripHill->trip);
    }
}
