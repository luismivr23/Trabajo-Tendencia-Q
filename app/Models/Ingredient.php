<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ingredient extends Model
{
    use HasFactory;

    protected $table = 'ingredients';

    protected $fillable = [
        'name',
        'description',
        'unit_measure',
        'stock',
        'status',
        'registered_by', // <-- Añadido para la auditoría del usuario
    ];

    protected $casts = [
        'stock' => 'decimal:2',
        'status' => 'boolean',
    ];

    public function dishes(): BelongsToMany
    {
        return $this->belongsToMany(
            Dish::class,
            'dish_ingredients',
            'ingredient_id',
            'dish_id'
        )
        ->withPivot('quantity')
        ->withTimestamps();
    }

    // Relación de auditoría con el usuario que registró el ingrediente
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'registered_by');
    }
}