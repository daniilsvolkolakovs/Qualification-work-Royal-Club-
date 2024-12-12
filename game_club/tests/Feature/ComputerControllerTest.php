<?php

namespace Tests\Feature;

use App\Models\Computer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ComputerControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $computer;
    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::factory()->admin()->create();

        $this->actingAs($this->admin);

        $this->computer = Computer::create([
            'name' => 'Test Computer',
            'price' => 500,
            'quantity' => 10,
            'computer_id' => uniqid('PC_'),
        ]);
    }

    // Verifying that the administrator can edit the computer
    public function testAdminCanEditComputer()
    {
        $response = $this->get(route('admin.computers.edit', ['id' => $this->computer->id]));
        $response->assertStatus(200);
    }

    // Verifying that the administrator can update the computer with the correct data
    public function testAdminCanUpdateComputerWithValidData()
    {
        $response = $this->put(route('admin.computers.update', ['id' => $this->computer->id]), [
            'name' => 'Updated Computer',
            'price' => 700,
        ]);

        $response->assertRedirect(route('admin.computers.index'));
        $this->assertDatabaseHas('computers', [
            'name' => 'Updated Computer',
            'price' => 700,
        ]);
    }

    // Check that the administrator cannot update a computer with incorrect data
    public function testAdminCannotUpdateComputerWithInvalidData()
    {
        $response = $this->put(route('admin.computers.update', ['id' => $this->computer->id]), [
            'name' => '',
            'price' => '',
        ]);

        $response->assertSessionHasErrors(['name', 'price']);
    }

    // Check that the administrator cannot update a computer with incorrect price
    public function testAdminCannotUpdateComputerWithPriceGreaterThan1000()
    {
        $response = $this->put(route('admin.computers.update', ['id' => $this->computer->id]), [
            'name' => 'Updated Computer',
            'price' => 1500,
        ]);

        $response->assertSessionHasErrors(['price']);
    }

    //Check for boundary value creation request 
    public function testAdminCannotCreateComputerWithInvalidQuantity()
    {
        $response = $this->post(route('admin.computers.store'), [
            'name' => 'Test Computer',
            'price' => 500,
            'quantity' => 0,
        ]);

        $response->assertSessionHasErrors(['quantity']);
        
        $response = $this->post(route('admin.computers.store'), [
            'name' => 'Test Computer',
            'price' => 500,
            'quantity' => 256,
        ]);

        $response->assertSessionHasErrors(['quantity']);
    }


    // Verifying that an administrator can delete a computer
    public function testAdminCanDeleteComputer()
    {
        $response = $this->delete(route('admin.computers.destroy', ['id' => $this->computer->id]));

        $response->assertRedirect(route('admin.computers.index'));
        $this->assertDatabaseMissing('computers', [
            'id' => $this->computer->id,
        ]);
    }
}