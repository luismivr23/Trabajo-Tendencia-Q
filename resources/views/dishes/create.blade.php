@extends('layouts.app')

@section('title','Crear Plato')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
		<div class="container-fluid">
		</div>
    </section>
	@include('layouts.partial.msg')
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header bg-secondary">
							<h3>@yield('title')</h3>
						</div>
						<form method="POST" action="{{ route('dishes.store') }}">
							@csrf
							<div class="card-body">
								
								<!-- Campo Nombre del Plato -->
								<div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Nombre <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="name" placeholder="Por ejemplo, Bandeja Paisa" autocomplete="off" value="{{ old('name') }}" required>
										</div>
									</div>
								</div>

								<!-- Campo Descripción -->
								<div class="row mt-2">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Descripción</label>
											<textarea class="form-control" name="description" rows="3" placeholder="Descripción del plato..." autocomplete="off">{{ old('description') }}</textarea>
										</div>
									</div>
								</div>

								<!-- Campo Precio -->
								<div class="row mt-2">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Precio <strong style="color:red;">(*)</strong></label>
											<input type="number" step="0.01" class="form-control" name="price" placeholder="Por ejemplo, 25000" autocomplete="off" value="{{ old('price') }}" required>
										</div>
									</div>
								</div>

								<hr>

								<!-- Sección de la tabla intermedia: Selección de Ingredientes (sin controlador pivote) -->
								<div class="row mt-3">
									<div class="col-lg-12">
										<label class="control-label font-weight-bold">Seleccionar Ingredientes:</label>
										<div class="row">
											@foreach($ingredients as $ingredient)
												<div class="col-md-4 mb-2">
													<div class="form-check">
														<input type="checkbox" name="ingredients[]" value="{{ $ingredient->id }}" class="form-check-input" id="ing_{{ $ingredient->id }}">
														<label class="form-check-label font-weight-normal" for="ing_{{ $ingredient->id }}">
															{{ $ingredient->name }} ({{ $ingredient->unit_measure }})
														</label>
													</div>
												</div>
											@endforeach
										</div>
									</div>
								</div>

								<!-- Campos ocultos de estado y usuario registrador al estilo de tu profesor -->
								<input type="hidden" class="form-control" name="status" value="1">
								<input type="hidden" class="form-control" name="registradopor" value="{{ Auth::user()->id }}">

							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col-lg-2 col-xs-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
									</div>
									<div class="col-lg-2 col-xs-4">
										<a href="{{ route('dishes.index') }}" class="btn btn-danger btn-block btn-flat">Atras</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection