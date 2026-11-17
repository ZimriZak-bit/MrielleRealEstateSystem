<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * Pair 1 testing duty: access control by role.
 * Run with:  php artisan test --filter=AuthAccessTest
 */
class AuthAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_are_sent_to_login(): void
    {
        foreach (['/dashboard', '/client', '/management', '/admin', '/admin/reports'] as $url) {
            $this->get($url)->assertRedirect(route('login'));
        }
    }

    public function test_client_can_open_client_pages_but_not_management_or_admin(): void
    {
        $client = User::factory()->create();

        $this->actingAs($client)->get('/client')->assertOk();
        $this->actingAs($client)->get('/properties')->assertOk();

        $this->actingAs($client)->get('/management')->assertRedirect(route('client.dashboard'));
        $this->actingAs($client)->get('/management/payments')->assertRedirect(route('client.dashboard'));
        $this->actingAs($client)->get('/admin')->assertRedirect(route('client.dashboard'));
        $this->actingAs($client)->get('/admin/reports')->assertRedirect(route('client.dashboard'));
    }

    public function test_management_can_open_management_pages_but_not_admin_or_client_pages(): void
    {
        $manager = User::factory()->management()->create();

        $this->actingAs($manager)->get('/management')->assertOk();
        $this->actingAs($manager)->get('/management/viewings')->assertOk();

        $this->actingAs($manager)->get('/admin/reports')->assertRedirect(route('management.dashboard'));
        $this->actingAs($manager)->get('/client')->assertRedirect(route('management.dashboard'));
    }

    public function test_admin_can_open_the_admin_dashboard_and_reports(): void
    {
        $admin = User::factory()->admin()->create();

        $this->actingAs($admin)->get('/admin')->assertOk();
        $this->actingAs($admin)->get('/admin/reports')->assertOk();

        $this->actingAs($admin)->get('/management')->assertRedirect(route('admin.dashboard'));
    }

    public function test_each_role_lands_on_its_own_dashboard(): void
    {
        $this->actingAs(User::factory()->create())->get('/dashboard')->assertRedirect(route('client.dashboard'));
        $this->actingAs(User::factory()->management()->create())->get('/dashboard')->assertRedirect(route('management.dashboard'));
        $this->actingAs(User::factory()->admin()->create())->get('/dashboard')->assertRedirect(route('admin.dashboard'));
    }

    public function test_login_works_and_a_wrong_password_is_rejected(): void
    {
        $user = User::factory()->create(['email' => 'amina@example.com']);

        $this->post('/login', ['email' => 'amina@example.com', 'password' => 'wrong-password'])
            ->assertSessionHasErrors('email');
        $this->assertGuest();

        $this->post('/login', ['email' => 'amina@example.com', 'password' => 'password'])
            ->assertRedirect(route('dashboard'));
        $this->assertAuthenticatedAs($user);
    }

    public function test_registration_always_creates_a_client_even_if_a_role_is_sent(): void
    {
        $this->post('/register', [
            'name' => 'New Person',
            'email' => 'new@example.com',
            'phone' => '0712345678',
            'password' => 'a-strong-pass',
            'password_confirmation' => 'a-strong-pass',
            'role' => User::ROLE_ADMIN, // must be ignored
        ])->assertRedirect(route('dashboard'));

        $this->assertDatabaseHas('users', ['email' => 'new@example.com', 'role' => User::ROLE_CLIENT]);
    }

    public function test_logout_ends_the_session(): void
    {
        $this->actingAs(User::factory()->create())->post('/logout')->assertRedirect(route('home'));
        $this->assertGuest();
    }
}

