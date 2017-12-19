@extends('layouts.master')

@section('content')

<div class="container">

		<div class="card bg-light">

			<div class="card-header">
				<h4>Alta de Ausencia</h4>		
			</div>
			<div class="card-body">
				<h5 class="card-title">
					Ingrese todos los datos y pulse Añadir:
				</h5>
				
				<form class="form" enctype="multipart/form-data" method="POST" action="">
					{{ csrf_field() }}

    				<div class="form-group">
    					<label for="fecha1">Fecha Inicio</label>
    					<input type="date" name="fecha1" id="fecha1" class="form-control" placeholder="Fecha de Inicio">
					</div>
					<div class="form-group">
    					<label for="fecha2">Fecha Fin</label>
    					<input type="date" name="fecha2" id="fecha2" class="form-control" placeholder="Fecha de Fin">
					</div>
					<div class="form-group">
						<label for="tipoAusencia">Seleccione Tipo</label>
						<select class="custom-select form-control" name="tipoAusencia">
							<option value="baja">
								baja
							</option>
							<option value="vacaciones">
								vacaciones
							</option>
							<option value="permiso">
								permiso
							</option>
							<option value="absentismo">
								ausencia
							</option>
						</select>
					</div>
				    <div class="form-group">
    					<label for="descripcion">Descripción</label>
    					<input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripción de la ausencia">
					</div>
					<div class="form-group">
    					<label for="nombreApellidos">Selecciona Trabajador</label>
						<select class="custom-select form-control" name="nombreApellidos">
						@foreach ($trabajador as $t)					
							<option value="{{ $t->nombreApellidos }}">
								{{ $t->nombreApellidos }}
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
							<a class="btn btn-dark" href="{{ url('ausencias') }}">
					          Ir a Ausencias
					        </a>
				        </div>
				        <div class="p-2">
							<a class="btn btn-dark" href="{{ url('trabajadores') }}">
					          Ir a Trabajadores
					        </a>
				        </div>
				    </div>
				</form>

				
			</div>
		</div>
	</div>



@stop