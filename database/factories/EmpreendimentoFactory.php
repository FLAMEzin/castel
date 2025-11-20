<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Empreendimento;

class EmpreendimentoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Empreendimento::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'descricao' => fake()->text(),
            'tipo' => fake()->numberBetween(-10000, 10000),
            'area' => fake()->numberBetween(-10000, 10000),
            'quartos' => fake()->numberBetween(-10000, 10000),
            'cidade' => fake()->word(),
            'local_lat' => fake()->randomFloat(0, 0, 9999999999.),
            'local_long' => fake()->randomFloat(0, 0, 9999999999.),
            'valor' => fake()->randomFloat(0, 0, 9999999999.),
            'destaque_home' => fake()->numberBetween(-10000, 10000),
        ];
    }
}
