<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_registers_user_with_valid_data()
    {
        $response = $this->post('/register', [
            'name' => 'testuser',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect('/home');
        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', ['email' => 'test@example.com']);
    }

    /** @test */
    public function it_requires_name_for_registration()
    {
        $response = $this->post('/register', [
            'name' => '',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertSessionHasErrors(['name']);
    }

    /** @test */
    public function it_requires_email_for_registration()
    {
        $response = $this->post('/register', [
            'name' => 'testuser',
            'email' => '',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertSessionHasErrors(['email']);
    }

    /** @test */
    public function it_requires_valid_email_format()
    {
        $response = $this->post('/register', [
            'name' => 'testuser',
            'email' => 'invalid-email',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertSessionHasErrors(['email']);
    }

    /** @test */
    public function it_checks_for_duplicate_email()
    {
        \App\Models\User::factory()->create(['email' => 'test@example.com']);

        $response = $this->post('/register', [
            'name' => 'testuser',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertSessionHasErrors(['email']);
    }

    /** @test */
    public function it_requires_password()
    {
        $response = $this->post('/register', [
            'name' => 'testuser',
            'email' => 'test@example.com',
            'password' => '',
            'password_confirmation' => '',
        ]);

        $response->assertSessionHasErrors(['password']);
    }

    /** @test */
    public function it_checks_password_confirmation()
    {
        $response = $this->post('/register', [
            'name' => 'testuser',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'differentpassword',
        ]);

        $response->assertSessionHasErrors(['password']);
    }

    /** @test */
    public function it_requires_password_to_be_at_least_8_characters()
    {
        $response = $this->post('/register', [
            'name' => 'testuser',
            'email' => 'test@example.com',
            'password' => 'short',
            'password_confirmation' => 'short',
        ]);

        $response->assertSessionHasErrors(['password']);
    }
}