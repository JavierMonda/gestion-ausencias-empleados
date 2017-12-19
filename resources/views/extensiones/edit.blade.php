@extends('layouts.master')

@section('content')	

<div class="container">

	
	<div class="card bg-light">
		<div class="card-header">
			<h4>Editar Extensión</h4>
		</div>
	
		<div class="card-body">
			<h5 class="card-text">Edite los datos siguientes y pulse confirmar:</h5>
			
			<form class="form" enctype="multipart/form-data" method="POST" action="">
				{{ method_field('PUT') }}

				{{ csrf_field() }}

				<div class="form-group">
					<label for="numero">Número de extensión</label>
					<input type="number" name="numero" id="numero" class="form-control" value="{{$extension->numero}}">
				</div>
				<div class="form-group">
					<label for="numPuerto">Número de puerto</label>
					<input type="number" name="numPuerto" id="numPuerto" class="form-control" value="{{$extension->numPuerto}}">
				</div>
				<div class="form-group">
					<label for="idDepartamento">ID del departamento</label>
					<input type="number" name="idDepartamento" id="idDepartamento" class="form-control" value="{{$extension->idDepartamento}}">
				</div>
				<div class="d-flex justify-content-end">
					<div class="form-group">
						<button type="submit" class="btn btn-primary">
							Confirmar
						</button>
						<a class="btn btn-secondary" href="{{ url('extensiones/' . $extension->id) }}"> 
							&lt; Volver
						</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
    

@stop