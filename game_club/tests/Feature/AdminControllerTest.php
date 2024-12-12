<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::factory()->admin()->create();

        $this->actingAs($this->admin);

        $this->user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'usertype' => 'user',
        ]);
    }

    // Verify that the admin can edit a user
    public function test_admin_can_edit_user()
    {
        $response = $this->get(route('admin.users.edit', ['id' => $this->user->id]));
        $response->assertStatus(200);
    }

    // Verify that the admin can update a user with valid data
    public function test_admin_can_update_user_with_valid_data()
    {
        $response = $this->post(route('admin.users.update', ['id' => $this->user->id]), [
            'name' => 'Updated User',
            'email' => 'updated@example.com',
            'usertype' => 'manager',
        ]);

        $response->assertRedirect(route('admin.users'));
        $this->assertDatabaseHas('users', [
            'id' => $this->user->id,
            'name' => 'Updated User',
            'email' => 'updated@example.com',
            'usertype' => 'manager',
        ]);
    }

    // Verify that the admin cannot update a user with empty fields
    public function test_admin_cannot_update_user_with_empty_fields()
    {
        $response = $this->post(route('admin.users.update', ['id' => $this->user->id]), [
            'name' => '',
            'email' => '',
            'usertype' => '',
        ]);

        $response->assertSessionHasErrors(['name', 'email', 'usertype']);
    }

    // Verify that the admin cannot update a user with an invalid email
    public function test_admin_cannot_update_user_with_invalid_email()
    {
        $response = $this->post(route('admin.users.update', ['id' => $this->user->id]), [
            'name' => 'Updated User',
            'email' => 'invalid-email',
            'usertype' => 'manager',
        ]);

        $response->assertSessionHasErrors(['email']);
    }

    // Verify that the admin can successfully delete a user
    public function test_admin_can_delete_user()
    {
        $response = $this->delete(route('admin.users.destroy', ['id' => $this->user->id]));

        $response->assertRedirect(route('admin.users'));
        $this->assertDatabaseMissing('users', [
            'id' => $this->user->id,
        ]);
    }
}