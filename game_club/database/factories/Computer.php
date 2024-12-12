<?php

namespace Database\Factories;

use App\Models\Computer;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComputerFactory extends Factory
{
    protected $model = Computer::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'price' => $this->faker->numberBetween(50, 200),
        ];
    }
}
