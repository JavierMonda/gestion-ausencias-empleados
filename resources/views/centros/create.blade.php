@extends('layouts.master')

@section('content')

<div class="container">

		<div class="card bg-light">

			<div class="card-header">
				<h4>Alta de Departamento</h4>		
			</div>
			<div class="card-body">
				<h5 class="card-title">
					Ingrese todos los datos y pulse Añadir:
				</h5>
				
				<form class="form" enctype="multipart/form-data" method="POST" action="">
					{{ csrf_field() }}

    				<div class="form-group">
    					<label for="nombreCentro">Nombre</label>
    					<input type="text" name="nombreCentro" id="nombreCentro" class="form-control" placeholder="Ingrese el nombre del Centro">
					</div>

				    <div class="form-group">
    					<label for="nombreEmpresa">Selecciona Empresa</label>
						<select class="custom-select form-control" name="nombreEmpresa">
						@foreach ($empresa as $e)					
							<option value="{{ $e->nombreEmpresa }}">
								{{ $e->nombreEmpresa }}
							</option>							
						@endforeach
						</select>
					</div>
					<div class="d-flex justify-content-end">
						<div class="p-2">
							<button type="submit" class="btn btn-primary">
								Añadir
							</button>
						</div>
						<div class="p-2">
							<a class="btn btn-secondary" href="{{ URL::previous() }}">
					          &lt; Volver
					        </a>
				        </div>
				    </div>
				</form>

				
			</div>
		</div>
	</div>



@stop