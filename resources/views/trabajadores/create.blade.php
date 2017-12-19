@extends('layouts.master')

@section('content')

<div class="container">

		<div class="card bg-light">

			<div class="card-header">
				<h4>Creación de nuevo Trabajador</h4>		
			</div>
			<div class="card-body">
				<h5 class="card-title">
					Ingrese todos los datos y pulse Añadir:
				</h5>
				
				<form class="form" enctype="multipart/form-data" method="POST" action="">
					{{ csrf_field() }}

    				<div class="form-group">
    					<label for="DNI">DNI</label>
    					<input type="text" name="DNI" id="DNI" class="form-control" placeholder="DNI del Trabajador">
					</div>
				    <div class="form-group">
    					<label for="foto">Foto</label>
    					<input type="file" name="foto" id="foto" class="form-control" placeholder="Subir Foto">
					</div>
					<div class="form-group">
    					<label for="nombreApellidos">Nombre completo</label>
    					<input type="text" name="nombreApellidos" id="nombreApellidos" class="form-control" placeholder="Ingrese el Nombre">
					</div>
					<div class="form-group">
    					<label for="FechaIni">Inicio de contrato</label>
    					<input type="date" name="FechaIni" id="FechaIni" class="form-control" placeholder="Fecha de inicio del contrato">
					</div>
					<div class="form-group">
    					<label for="Observaciones">Observaciones</label>
    					<input type="text" name="Observaciones" id="Observaciones" class="form-control" placeholder="Observaciones">
					</div>
					<div class="form-group">
    					<label for="nombreDepartamento">Selecciona Almacén</label>
						<select class="custom-select form-control" name="nombreDepartamento">
						@foreach ($departamento as $d)					
							<option value="{{ $d->nombreDepartamento }}">
								{{ $d->nombreDepartamento }}
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