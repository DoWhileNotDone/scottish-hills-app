<?php

namespace Tests\Integration;

use App\Models\Hill;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use Tests\TestCase;

class HillRelationshipsTest extends TestCase
{
    use RefreshDatabase;

    public function test_hill_has_no_trips(): void
    {
        $hill = Hill::factory()->create();

        $this->assertInstanceOf(Collection::class, $hill->trips);

        $this->assertEquals(0, $hill->trips->count());
    }

    public function test_trip_has_hills(): void
    {
        $hill = Hill::factory()
            ->hasAttached(
                Trip::factory()->count(3),
                ['user_id' => User::factory()->create()->id]
            )
        ->create();

        $this->assertInstanceOf(Collection::class, $hill->trips);

        $this->assertEquals(3, $hill->trips->count());
    }
}
