@extends('layouts.master')

@section('content')	

<div class="container">

	
	<div class="card bg-light">
		<div class="card-header">
			<h4>Editar Ausencia</h4>
		</div>
	
		<div class="card-body">
			<h5 class="card-text">Edite los datos siguientes y pulse confirmar:</h5>
			
			<form class="form" enctype="multipart/form-data" method="POST" action="">
				{{ method_field('PUT') }}

				{{ csrf_field() }}

				<div class="form-group">
					<label for="fechaAusencia">Fecha</label>
					<input type="date" name="fechaAusencia" id="fechaAusencia" class="form-control" value="{{$ausencia->fechaAusencia}}">
				</div>
				<div class="form-group">
					<label for="tipoAusencia">Seleccione Tipo</label>
					<select class="custom-select form-control" name="tipoAusencia">			
						<option value="{{ $ausencia->tipoAusencia }}" selected>
							Tipo aplicado: {{ $ausencia->tipoAusencia }}
						</option>
						<option value="baja">
							baja
						</option>
						<option value="vacaciones">
							vacaciones
						</option>
						<option value="permiso">
							permiso
						</option>
						<option value="ausencia">
							ausencia
						</option>
					</select>
				</div>
				<div class="form-group">
					<label for="descripcion">Descripción</label>
					<input type="text" name="descripcion" id="descripcion" class="form-control" value="{{$ausencia->descripcion}}">
				</div>
				<div class="form-group">
					<label for="nombreApellidos">Trabajador</label>
					<input type="text" name="nombreApellidos" id="nombreApellidos" class="form-control" value="{{$ausencia->nombreApellidos}}" readonly>
				</div>
				<div class="d-flex justify-content-end">
					<div class="form-group">
						<button type="submit" class="btn btn-primary">
							Confirmar
						</button>
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