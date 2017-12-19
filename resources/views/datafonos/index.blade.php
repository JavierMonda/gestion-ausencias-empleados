@extends('layouts.master')

@section('content')

<div class="container">
	<div class="d-flex justify-content-start">
		<div class="p-2">
			<h4 class="card-title">Listado de Datafonos</h4>
		</div>
	</div>
	<div class="d-flex justify-content-center">

		<table class="table table-hover">
			<thead class="thead-inverse">
				<tr>
					<th class="text-center">Número TPV</th>
					<th class="text-center">Número Comercio</th>
					<th class="text-center">Banco</th>
					<th class="text-center">Conexión</th>
					<th class="text-center">Ubicación</th>
					<th class="text-center"></th>
				</tr>
			</thead>
		@foreach ( $datafono as $d )
		
			<tbody>
				<tr>
					<th class="text-center">{{$d->numTPV}}</th>
					<th class="text-center">{{$d->numComercio}}</th>
					<th class="text-center">{{$d->banco}}</th>
					<th class="text-center">{{$d->conexion}}</th>
					<th class="text-center">{{$d->idCentroDatafonos}}</th>
					<th class="text-center"><a class="btn btn-success btn-sm" href="{{ url('/datafonos/' . $d->id ) }}">
				            Ver    
				        </a>
				    </th>
				</tr>
			</tbody>

		@endforeach
		</table>
	</div>
	<div class="d-flex justify-content-end">
		<div class="p-2">
			<a class="btn btn-info" href="{{ url('/datafonos/create') }}">
				Crear Datáfono    
			</a>
		</div>
		<div class="p-2">
			<a class="btn btn-secondary" href="{{ url('/') }}">
				&lt; Volver
			</a>
		</div>
	</div>
</div>
@stop