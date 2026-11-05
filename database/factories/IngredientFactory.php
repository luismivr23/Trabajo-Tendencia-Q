<?php

namespace Database\Factories;

use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Ingredient>
 */
class IngredientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(2, true),
            'description' => fake()->sentence(),
            'unit_measure' => fake()->randomElement(['kg', 'g', 'l', 'ml', 'unidad']),
            'stock' => fake()->randomFloat(2, 1, 100),
            'status' => fake()->boolean(),
        ];
    }
}