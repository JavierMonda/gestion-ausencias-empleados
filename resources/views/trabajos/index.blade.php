@extends('layouts.master')

@section('content')

<div class="container">
	<div class="d-flex justify-content-start">
		<div class="p-2">
			<h4 class="card-title">Listado de trabajos</h4>
		</div>
	</div>
	<div class="d-flex justify-content-center">

		<table class="table table-hover">
			<thead class="thead-inverse">
				<tr>
					<th class="text-center">ID</th>
					<th class="text-center">Descripción</th>
					<th class="text-center"></th>
				</tr>
			</thead>
		@foreach ( $trabajo as $t )
		
			
				<tr>
					<th class="text-center">{{$t->id}}</th>
					<th class="text-center">{{$t->descripcionTrabajos}}</th>
					<th class="text-center"><a class="btn btn-success btn-sm" href="{{ url('/trabajos/' . $t->id ) }}">
				            Ver    
				        </a>
				    </th>
				</tr>

		@endforeach
		</table>
	</div>
	<div class="d-flex justify-content-end">
		<div class="p-2">
			<a class="btn btn-info" href="{{ url('/trabajos/create') }}">
				Alta de nuevo trabajo    
			</a>
		</div>
		<div class="p-2">
			@if (auth()->user()->email == 'julian.hernandez@fuerteventuraoasispark.com') 
			<a class="btn btn-secondary" href="{{ url('/servicio-tecnico') }}">
				&lt; Volver
			</a>
		@else 
			<a class="btn btn-secondary" href="{{ url('/') }}">
				&lt; Volver
			</a>
		@endif
		</div>
	</div>
</div>
@stop