@extends('layouts.master')

@section('content')	

<div class="container">

	
	<div class="card bg-light">
		<div class="card-header">
			<h4>Editar Departamento</h4>
		</div>
	
		<div class="card-body">
			<h5 class="card-text">Edite los datos siguientes y pulse confirmar:</h5>
			
			<form class="form" enctype="multipart/form-data" method="POST" action="">
				{{ method_field('PUT') }}

				{{ csrf_field() }}

				<div class="form-group">
					<label for="nombreCentro">Nombre</label>
					<input type="text" name="nombreCentro" id="nombreCentro" class="form-control" value="{{$centro->nombreCentro}}">
				</div>
				<div class="form-group">
					<label for="nombreEmpresa">Empresa</label>
					<input type="text" name="nombreEmpresa" id="nombreEmpresa" class="form-control" value="{{$centro->nombreEmpresa}}" readonly>
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