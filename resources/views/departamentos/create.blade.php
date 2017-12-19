@extends('layouts.master')

@section('content')

<div class="container">

		<div class="card bg-light">

			<div class="card-header">
				<h4>Creación de nuevo Departamento</h4>		
			</div>
			<div class="card-body">
				<h5 class="card-title">
					Ingrese todos los datos y pulse Añadir:
				</h5>
				
				<form class="form" enctype="multipart/form-data" method="POST" action="">
					{{ csrf_field() }}

    				<div class="form-group">
    					<label for="nombreDepartamento">Nombre</label>
    					<input type="text" name="nombreDepartamento" id="nombreDepartamento" class="form-control" placeholder="Ingrese el nombre">
					</div>
				    <div class="form-group">
    					<label for="TlfDepartamento">Teléfono</label>
    					<input type="text" name="TlfDepartamento" id="TlfDepartamento" class="form-control" placeholder="Ingrese el número de Teléfono">
					</div>
					<div class="form-group">
    					<label for="JefeDepartamento">Responsable</label>
    					<input type="text" name="JefeDepartamento" id="JefeDepartamento" class="form-control" placeholder="Responsable del Departamento">
					</div>

					<div class="form-group">
    					<label for="nombreCentro">Selecciona Departamento</label>
						<select class="custom-select form-control" name="nombreCentro">
						@foreach ($centro as $c)					
							<option value="{{ $c->nombreCentro }}">
								{{ $c->nombreCentro }}
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