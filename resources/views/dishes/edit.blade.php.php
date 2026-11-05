@extends('layouts.app')

@section('title','Edit Dish')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Edit Dish</h1>
				</div>
			</div>
		</div>
    </section>

    <section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Update Dish Information</h3>
						</div>
						
						<!-- Formulario de actualización utilizando el método PUT -->
						<form action="{{ route('dishes.update', $dish->id) }}" method="POST">
							@csrf
							@method('PUT')
							
							<div class="card-body">
								
								<!-- Nombre del plato -->
								<div class="form-group">
									<label for="name">Dish Name</label>
									<input type="text" name="name" class="form-control" id="name" value="{{ old('name', $dish->name) }}" required>
								</div>

								<!-- Descripción -->
								<div class="form-group">
									<label for="description">Description</label>
									<textarea name="description" class="form-control" id="description" rows="3">{{ old('description', $dish->description) }}</textarea>
								</div>

								<!-- Precio -->
								<div class="form-group">
									<label for="price">Price</label>
									<input type="number" step="0.01" name="price" class="form-control" id="price" value="{{ old('price', $dish->price) }}" required>
								</div>

								<!-- Estado -->
								<div class="form-group">
									<label for="status">Status</label>
									<select name="status" class="form-control" id="status">
										<option value="1" {{ $dish->status == 1 ? 'selected' : '' }}>Active</option>
										<option value="0" {{ $dish->status == 0 ? 'selected' : '' }}>Inactive</option>
									</select>
								</div>

								<hr>

								<!-- Sección de la tabla intermedia: Selección de Ingredientes (con verificación de cuáles ya están asociados) -->
								<div class="form-group">
									<label>Select Ingredients & Quantities:</label>
									<div class="row">
										@foreach($ingredients as $ingredient)
											<div class="col-md-4 mb-2">
												<div class="form-check">
													<!-- Comprobamos si el plato ya tiene este ingrediente asociado para marcarlo como 'checked' -->
													<input type="checkbox" name="ingredients[]" value="{{ $ingredient->id }}" class="form-check-input" id="ing_{{ $ingredient->id }}"
														{{ $dish->ingredients->contains($ingredient->id) ? 'checked' : '' }}>
													
													<label class="form-check-label font-weight-normal" for="ing_{{ $ingredient->id }}">
														{{ $ingredient->name }} ({{ $ingredient->unit_measure }})
													</label>
												</div>
											</div>
										@endforeach
									</div>
								</div>

							</div>

							<div class="card-footer">
								<button type="submit" class="btn btn-primary">Update Dish</button>
								<a href="{{ route('dishes.index') }}" class="btn btn-secondary">Cancel</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
    </section>
</div>
@endsection