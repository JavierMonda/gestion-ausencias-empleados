@extends('layouts.master')

@section('content')	

<div class="container">

	
	<div class="card bg-light">
		<div class="card-header">
			<h4>Editar Datáfono</h4>
		</div>
	
		<div class="card-body">
			<h5 class="card-text">Edite los datos siguientes y pulse confirmar:</h5>
			
			<form class="form" enctype="multipart/form-data" method="POST" action="">
				{{ method_field('PUT') }}

				{{ csrf_field() }}

				<div class="form-group">
					<label for="numTPV">Número de TPV</label>
					<input type="text" name="numTPV" id="numTPV" class="form-control" value="{{$datafono->numTPV}}">
				</div>
				<div class="form-group">
					<label for="numComercio"> Número de Comercio</label>
					<input type="text" name="numComercio" id="numComercio" class="form-control" value="{{$datafono->numComercio}}">
				</div>
				<div class="form-group">
					<label for="banco">Banco</label>
					<input type="text" name="banco" id="banco" class="form-control" value="{{$datafono->banco}}">
				</div>
				<div class="form-group">
					<label for="conexion">Tipo de Conexión</label>
					<input type="text" name="conexion" id="conexion" class="form-control" value="{{$datafono->conexion}}">
				</div>
				<div class="form-group">
					<label for="idCentroDatafonos">ID del Centro</label>
					<input type="number" name="idCentroDatafonos" id="idCentroDatafonos" class="form-control" value="{{$datafono->idCentroDatafonos}}">
				</div>
				<div class="d-flex justify-content-end">
					<div class="form-group">
						<button type="submit" class="btn btn-primary">
							Confirmar
						</button>
						<a class="btn btn-secondary" href="{{ url('datafonos/' . $datafono->id) }}"> 
							&lt; Volver
						</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
    

@stop