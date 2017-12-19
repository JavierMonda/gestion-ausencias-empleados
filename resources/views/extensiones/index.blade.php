@extends('layouts.master')

@section('content')

<div class="container">
	<div class="d-flex justify-content-start">
		<div class="p-2">
			<h4 class="card-title">Listado de Extensiones</h4>
		</div>
	</div>
	<div class="d-flex justify-content-center">

		<table class="table table-hover">
			<thead class="thead-inverse">
				<tr>
					<th class="text-center">ID</th>
					<th class="text-center">Número</th>
					<th class="text-center">Puerto</th>
					<th class="text-center">Departamento</th>
					<th class="text-center"></th>
				</tr>
			</thead>
		@foreach ( $extension as $e )
		
			<tbody>
				<tr>
					<th class="text-center">{{$e->id}}</th>
					<th class="text-center">{{$e->numero}}</th>
					<th class="text-center">{{$e->numPuerto}}</th>
					<th class="text-center">{{$e->idDepartamento}}</th>
					<th class="text-center"><a class="btn btn-success btn-sm" href="{{ url('/extensiones/' . $e->id ) }}">
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
			<a class="btn btn-info" href="{{ url('/extensiones/create') }}">
				Crear Extensión    
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