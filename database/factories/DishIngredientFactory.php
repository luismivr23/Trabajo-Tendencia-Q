<?php

namespace Database\Factories;

use App\Models\Dish;
use App\Models\DishIngredient;
use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Factories\Factory;

class DishIngredientFactory extends Factory
{
    public function definition(): array
    {
        return [
            'dish_id' => Dish::inRandomOrder()->first()->id,
            'ingredient_id' => Ingredient::inRandomOrder()->first()->id,
            'quantity' => fake()->randomFloat(2, 1, 10),
        ];
    }
}