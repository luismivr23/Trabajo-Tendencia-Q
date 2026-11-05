<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $table = 'dishes';

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',         // <-- Añadido para la imagen del plato
        'status',
        'registered_by', // <-- Añadido para el usuario que registra
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'status' => 'boolean',
    ];

    public function dishIngredients()
    {
        return $this->hasMany(DishIngredient::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(
            Ingredient::class,
            'dish_ingredients',
            'dish_id',
            'ingredient_id'
        )
        ->withPivot('quantity')
        ->withTimestamps();
    }

    // Relación opcional con el usuario que registró el plato (Auditoría)
    public function user()
    {
        return $this->belongsTo(User::class, 'registered_by');
    }
}