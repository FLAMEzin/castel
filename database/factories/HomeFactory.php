<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Home;

class HomeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Home::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'email' => fake()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'endereco' => fake()->word(),
            'whatsapp_business' => fake()->word(),
            'title' => fake()->sentence(4),
            'sub_title' => fake()->word(),
            'horario_atendimento' => fake()->word(),
        ];
    }
}
