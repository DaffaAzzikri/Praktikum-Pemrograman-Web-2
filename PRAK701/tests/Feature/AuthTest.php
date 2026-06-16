<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test guest cannot access protected routes and is redirected with warning.
     */
    public function test_guest_is_redirected_to_login_with_warning(): void
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect('/login');
        $response->assertSessionHas('warning', 'Login terlebih dahulu!');
    }

    /**
     * Test guest can view login page.
     */
    public function test_guest_can_view_login_page(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
    }

    /**
     * Test validation during login.
     */
    public function test_login_validation_rules(): void
    {
        $response = $this->post('/login', [
            'email' => '',
            'password' => '',
        ]);

        $response->assertSessionHasErrors(['email', 'password']);
    }

    /**
     * Test login failure displays correct alert message.
     */
    public function test_login_failure_shows_alert(): void
    {
        $response = $this->post('/login', [
            'email' => 'wrong@mail.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('error', 'Email atau Password salah!');
    }

    /**
     * Test login success redirects to dashboard with welcome message.
     */
    public function test_login_success_redirects_to_dashboard(): void
    {
        $user = User::factory()->create([
            'email' => 'admin@mail.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->post('/login', [
            'email' => 'admin@mail.com',
            'password' => 'password',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($user);
        $response->assertSessionHas('success', 'Selamat datang kembali!');
    }

    /**
     * Test authenticated user cannot view login page.
     */
    public function test_authenticated_user_cannot_view_login_page(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/login');

        $response->assertRedirect('/dashboard');
    }

    /**
     * Test logout process.
     */
    public function test_user_can_logout(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/logout');

        $response->assertRedirect('/login');
        $this->assertGuest();
        $response->assertSessionHas('success', 'Berhasil logout!');
    }
}
