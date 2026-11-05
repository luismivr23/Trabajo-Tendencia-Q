<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\IngredientController; // 1. Importas el controlador de ingredientes

Route::get('/', function () {
    return view('welcome');
});

/*
Route::get('/about', function () { 
return 'Acerca de nosotros';
});

Route::get('/user/{id}', function ($id) { 
return 'ID de usuario:' . $id;
})->where('id', '[0-9]{3}');

Route::prefix("admin")->group(function () { 
    Route::get("/", function () { 
return 'Panel de administracion';
});
Route::get("users", function () { 
return 'Lista de usuarios';
});
});
*/

Auth::routes();

// Rutas protegidas que requieren autenticación
Route::middleware(['auth'])->group(function () { 
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    // Ruta resource para Usuarios
    Route::resource('users', UserController::class);

    // Ruta resource para Platos (Dishes)
    Route::resource('dishes', DishController::class);

    // Ruta resource para Ingredientes (Ingredients)
    Route::resource('ingredients', IngredientController::class); // 2. Añades la ruta resource para ingredientes
});