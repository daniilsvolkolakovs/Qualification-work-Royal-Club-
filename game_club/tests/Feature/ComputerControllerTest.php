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

    // Проверка, что администратор может редактировать компьютер
    public function testAdminCanEditComputer()
    {
        $response = $this->get(route('admin.computers.edit', ['id' => $this->computer->id]));
        $response->assertStatus(200);
    }

    // Проверка, что администратор может обновить компьютер с правильными данными
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

    // Проверка, что администратор не может обновить компьютер с некорректными данными
    public function testAdminCannotUpdateComputerWithInvalidData()
    {
        $response = $this->put(route('admin.computers.update', ['id' => $this->computer->id]), [
            'name' => '',
            'price' => '',
        ]);

        $response->assertSessionHasErrors(['name', 'price']);
    }


    // Проверка, что администратор может удалить компьютер
    public function testAdminCanDeleteComputer()
    {
        $response = $this->delete(route('admin.computers.destroy', ['id' => $this->computer->id]));

        $response->assertRedirect(route('admin.computers.index'));
        $this->assertDatabaseMissing('computers', [
            'id' => $this->computer->id,
        ]);
    }
}