@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <h3 class="card-title mb-0">Register New Ingredient</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('ingredients.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="unit_measure">Unit Measure (Ej: kg, g, ml, unidad)</label>
                            <input type="text" name="unit_measure" id="unit_measure" class="form-control" required value="{{ old('unit_measure') }}">
                        </div>

                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="number" step="0.01" name="stock" id="stock" class="form-control" required value="{{ old('stock') }}">
                        </div>

                        <div class="form-group text-right">
                            <a href="{{ route('ingredients.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-success">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection