<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Dish;
use App\Models\Ingredient;
use App\Models\DishIngredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::factory(10)->create();

        Dish::factory(10)->create();

        Ingredient::factory(20)->create();

        DishIngredient::factory(20)->create();
    }
}