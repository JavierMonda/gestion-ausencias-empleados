@extends('layouts.master')

@section('content')

<div class="container">
	<div class="d-flex justify-content-center">
		<div class="p-2 text-center" style="border-bottom: 1px solid blue;">
			<i class="fa fa-archive fa-5x" aria-hidden="true"></i>
			<h4 class="card-title">Departamentos</h4>
		</div>
	</div>
	<div class="d-flex justify-content-center">

		<table class="table table-hover">
			<thead class="thead-inverse">
				<tr>
					<th class="text-center">ID del Departamento</th>
					<th class="text-center">Nombre</th>
					<th class="text-center">Empresa a la que pertenece</th>
					<th class="text-center"></th>
				</tr>
			</thead>
		
		
			<tbody>
			@foreach ( $centro as $c )
				<tr>
					<td class="text-center">{{$c->id}}</td>
					<td class="text-center">{{$c->nombreCentro}}</td>
					<td class="text-center">{{$c->nombreEmpresa}}</td>
					<td class="text-center"><a class="btn btn-success btn-sm" href="{{ url('/centros/' . $c->id ) }}">
				           <i class="fa fa-eye" aria-hidden="true"></i>    
				        </a>
				    </td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="d-flex justify-content-start">{{ $centro->links('pagination') }}</div>
	<div class="d-flex justify-content-end">
		<div class="p-2">
			<a class="btn btn-info" href="{{ url('/centros/create') }}">
				Alta de Departamento    
			</a>
		</div>
		<div class="p-2">
			<a class="btn btn-secondary" href="{{ URL::previous() }}">
				&lt; Volver
			</a>
		</div>
	</div>
</div>
@stop