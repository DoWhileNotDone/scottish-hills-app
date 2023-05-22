<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeHillListTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_home_page_as_guest(): void
    {
        $this->assertGuest();

        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_view_home_page_as_registered_user(): void
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
