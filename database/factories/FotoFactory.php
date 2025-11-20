<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Empreendimento;
use App\Models\Foto;

class FotoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Foto::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'empreendimento_id' => Empreendimento::factory(),
            'sub_title' => fake()->word(),
            'file_name' => fake()->word(),
        ];
    }
}
