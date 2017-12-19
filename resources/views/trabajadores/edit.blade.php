@extends('layouts.master')

@section('content')	

<div class="container">

	
	<div class="card bg-light">
		<div class="card-header">
			<h4>Editar Trabajador</h4>
		</div>
	
		<div class="card-body">
			<h5 class="card-text">Edite los datos siguientes y pulse confirmar:</h5>
			
			<form class="form" enctype="multipart/form-data" method="POST" action="">
				{{ method_field('PUT') }}

				{{ csrf_field() }}

				<div class="form-group">
					<label for="DNI">DNI</label>
					<input type="text" name="DNI" id="DNI" class="form-control" value="{{$trabajador->DNI}}">
				</div>
				<div class="form-group">
					<label for="foto">Foto</label><img class="img img-responsive" src="{{ asset($trabajador->foto) }}" style="height: 50px;width: 50px"/>
					<input type="file" name="foto" id="foto" class="form-control" value="{{ $trabajador->foto }}">
				</div>
				<div class="form-group">
					<label for="nombreApellidos">Nombre Completo</label>
					<input type="text" name="nombreApellidos" id="nombreApellidos" class="form-control" value="{{$trabajador->nombreApellidos}}">
				</div>
				<div class="form-group">
					<label for="FechaIni">Inicio de Contrato</label>
					<input type="date" name="FechaIni" id="FechaIni" class="form-control" value="{{$trabajador->FechaIni}}">
				</div>
				<div class="form-group">
					<label for="FechaFin">Fin de Contrato</label>
					<input type="date" name="FechaFin" id="FechaFin" class="form-control" value="{{$trabajador->FechaFin}}">
				</div>
				<div class="form-group">
					<label for="Observaciones">Observaciones</label>
					<input type="text" name="Observaciones" id="Observaciones" class="form-control" value="{{$trabajador->Observaciones}}">
				</div>
				<div class="form-group">
					<label for="tipoContrato">Tipo de Contrato</label>
					<input type="text" name="tipoContrato" id="tipoContrato" class="form-control" value="{{$trabajador->tipoContrato}}">
				</div>
				<div class="form-group">
					<label for="vacaciones">Vacaciones</label>
					<input type="number" name="vacaciones" id="vacaciones" class="form-control" value="{{$trabajador->vacaciones}}">
				</div>
				<!--<div class="form-group">
					<label for="nombreDepartamento">Almacén</label>
					<input type="text" name="nombreDepartamento" id="nombreDepartamento" class="form-control" value="{{$trabajador->nombreDepartamento}}" readonly>
				</div>-->
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