<?php

namespace Tests\Integration;

use App\Models\User;
use App\Models\UserTrip;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Collection;
use Tests\TestCase;

class UserTripRelationshipsTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_trip_has_user(): void
    {
        $userTrip = UserTrip::factory()
            ->hasHills(3)
            ->create();

        $this->assertInstanceOf(User::class, $userTrip->user);
    }

    public function test_user_trip_has_hills(): void
    {
        $userTrip = UserTrip::factory()
            ->hasHills(3)
            ->create();

        $this->assertInstanceOf(Collection::class, $userTrip->hills);
    }
}
