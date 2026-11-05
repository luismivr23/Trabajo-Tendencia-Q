@extends('layouts.app')

@section('title','List of Dishes')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
		<div class="container-fluid">
		</div>
    </section>

    <section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header bg-secondary" style="font-size: 1.75rem; font-weight: 500; line-height: 1.2; margin-bottom: 0.5rem;">
							@yield('title')
							<a href="{{ route('dishes.create') }}" class="btn btn-primary float-right" title="New"><i class="fas fa-plus"></i></a>
						</div>
						<div class="card-body">
							<table id="example1" class="table table-bordered table-hover" style="width:100%">
								<thead class="text-primary">
									<tr>
										<th width="10px">ID</th>
										<th>Name</th>
										<th>Description</th>
										<th>Price</th>
										<th width="80px">Status</th>
										<th width="90px">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($dishes as $dish)
									<tr>
										<td>{{ $dish->id }}</td>
										<td>{{ $dish->name }}</td>
										<td>{{ $dish->description }}</td>
										<td>${{ number_format($dish->price, 2) }}</td>
										<td>
											@if($dish->status)
												<span class="badge bg-success">Active</span>
											@else
												<span class="badge bg-danger">Inactive</span>
											@endif
										</td>
										<td>
											<a href="{{ route('dishes.edit', $dish->id) }}" class="btn btn-info btn-sm" title="Edit"><i class="fas fa-pencil-alt"></i></a>
											
											<form class="d-inline delete-form" action="{{ route('dishes.destroy', $dish->id) }}" method="POST">
												@csrf
												@method('DELETE')
												<button type="submit" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash-alt"></i></button>
											</form>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>
</div>
@endsection

@push('scripts')
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      // Si prefieres que la paginación y textos de la tabla también estén en inglés, puedes omitir la línea de idioma o configurarla en inglés.
    });
  });
</script>
@endpush