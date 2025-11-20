<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\About;

class AboutFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = About::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'sub_title' => fake()->word(),
            'anos_historia' => fake()->numberBetween(-10000, 10000),
            'obras_entregues' => fake()->numberBetween(-10000, 10000),
            'text_about' => fake()->text(),
        ];
    }
}
