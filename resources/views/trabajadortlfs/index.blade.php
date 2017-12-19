@extends('layouts.master')

@section('content')

<div class="container">
	<div class="d-flex justify-content-start">
		<div class="p-2">
			<h4 class="card-title">Listado de teléfonos</h4>
		</div>
	</div>
	<div class="d-flex justify-content-center">

		<table class="table table-hover">
			<thead class="thead-inverse">
				<tr>
					<th class="text-center">ID</th>
					<th class="text-center">ID trabajador</th>
					<th class="text-center">Teléfono</th>
					<th class="text-center"></th>
				</tr>
			</thead>
		@foreach ( $trabajadortlf as $t )
		
			
				<tr>
					<th class="text-center">{{$t->id}}</th>
					<th class="text-center">{{$t->idTrabajadorTlf}}</th>
					<th class="text-center">{{$t->TlfTrabajador}}</th>
					<th class="text-center"><a class="btn btn-success btn-sm" href="{{ url('/trabajadortlfs/' . $t->id ) }}">
				            Ver    
				        </a>
				    </th>
				</tr>

		@endforeach
		</table>
	</div>
	<div class="d-flex justify-content-end">
		<div class="p-2">
			<a class="btn btn-info" href="{{ url('/trabajadortlfs/create') }}">
				Añadir Teléfono    
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