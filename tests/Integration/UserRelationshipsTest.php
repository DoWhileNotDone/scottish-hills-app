<?php

namespace Tests\Integration;

use App\Models\User;
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
}
