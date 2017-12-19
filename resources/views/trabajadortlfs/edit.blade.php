@extends('layouts.master')

@section('content')	

<div class="container">

	
	<div class="card bg-light">
		<div class="card-header">
			<h4>Editar Teléfono</h4>
		</div>
	
		<div class="card-body">
			<h5 class="card-text">Edite los datos siguientes y pulse confirmar:</h5>
			
			<form class="form" enctype="multipart/form-data" method="POST" action="">
				{{ method_field('PUT') }}

				{{ csrf_field() }}

				<div class="form-group">
					<label for="idTrabajadorTlf">ID del Trabajador</label>
					<input type="number" name="idTrabajadorTlf" id="idTrabajadorTlf" class="form-control" value="{{$trabajadortlf->idTrabajadorTlf}}">
				</div>
				<div class="form-group">
					<label for="TlfTrabajador">Teléfono</label>
					<input type="text" name="TlfTrabajador" id="TlfTrabajador" class="form-control" value="{{$trabajadortlf->TlfTrabajador}}">
				</div>
				<div class="d-flex justify-content-end">
					<div class="form-group">
						<button type="submit" class="btn btn-primary">
							Confirmar
						</button>
						<a class="btn btn-secondary" href="{{ url('trabajadortlfs/' . $trabajadortlf->id) }}"> 
							&lt; Volver
						</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
    

@stop