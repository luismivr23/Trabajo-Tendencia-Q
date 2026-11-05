<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Ingredient;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dishes = Dish::all();
        return view('dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ingredients = Ingredient::all();
        return view('dishes.create', compact('ingredients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Manejo y subida de la imagen
        $image = $request->file('image');
        $slug = Str::slug($request->name);
        
        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            
            if (!file_exists('uploads/dishes')) {
                mkdir('uploads/dishes', 0777, true);
            }
            $image->move('uploads/dishes', $imagename);
        } else {
            $imagename = "";
        }

        // 2. Creación e instanciación manual del plato
        $dish = new Dish();
        $dish->name = $request->name;
        $dish->description = $request->description;
        $dish->price = $request->price;
        $dish->image = $imagename;
        $dish->status = 1;
        $dish->registered_by = Auth::user()->id;
        $dish->save();

        // 3. Sincronización de los ingredientes con cantidad por defecto (Solución 2)
        if ($request->has('ingredients')) {
            $ingredientsData = [];
            foreach ($request->ingredients as $ingredientId) {
                $ingredientsData[$ingredientId] = ['quantity' => 1]; 
            }
            $dish->ingredients()->sync($ingredientsData);
        }

        return redirect()->route('dishes.index')->with('success', 'Plato registrado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dish = Dish::with('ingredients')->findOrFail($id);
        return view('dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dish = Dish::with('ingredients')->findOrFail($id);
        $ingredients = Ingredient::all();
        
        return view('dishes.edit', compact('dish', 'ingredients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dish = Dish::findOrFail($id);
        
        $image = $request->file('image');
        $slug = Str::slug($request->name);

        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            
            if (!file_exists('uploads/dishes')) {
                mkdir('uploads/dishes', 0777, true);
            }
            $image->move('uploads/dishes', $imagename);
            $dish->image = $imagename;
        }

        $dish->name = $request->name;
        $dish->description = $request->description;
        $dish->price = $request->price;
        $dish->save();

        // Sincronización de ingredientes en actualización con cantidad por defecto
        if ($request->has('ingredients')) {
            $ingredientsData = [];
            foreach ($request->ingredients as $ingredientId) {
                $ingredientsData[$ingredientId] = ['quantity' => 1]; 
            }
            $dish->ingredients()->sync($ingredientsData);
        } else {
            $dish->ingredients()->detach();
        }

        return redirect()->route('dishes.index')->with('success', 'Plato actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dish = Dish::findOrFail($id);
        $dish->delete();

        return redirect()->route('dishes.index')->with('success', 'Plato eliminado exitosamente.');
    }
}