@extends('layouts.master')

@section('content')

<div class="container">
	<div class="d-flex justify-content-center">
		<div class="p-2 text-center" style="border-bottom: 1px solid blue;">
			<i class="fa fa-folder-open-o fa-5x" aria-hidden="true"></i>
			<h4 class="card-title">Almacenes</h4>
		</div>
	</div>
	<div class="d-flex justify-content-center">
		<table class="table table-hover">
			<thead class="thead-inverse">
				<tr>
					<th class="text-center">ID</th>
					<th class="text-center">Nombre</th>
					<th class="text-center">Teléfono</th>
					<th class="text-center">Responsable</th>
					<th class="text-center">Departamento</th>
					<th class="text-center"></th>
				</tr>
			</thead>
		@foreach ( $departamento as $d )
		
			<tbody>
				<tr>
					<th class="text-center">{{$d->id}}</th>
					<th class="text-center">{{$d->nombreDepartamento}}</th>
					<th class="text-center">{{$d->TlfDepartamento}}</th>
					<th class="text-center">{{$d->JefeDepartamento}}</th>
					<th class="text-center">{{$d->nombreCentro}}</th>
					<th class="text-center"><a class="btn btn-success btn-sm" href="{{ url('/departamentos/' . $d->id ) }}">
				            <i class="fa fa-eye" aria-hidden="true"></i>    
				        </a>
				    </th>
				</tr>
			

		@endforeach
				<tr>
					<th class="text-center">
						{{ $departamento->links('pagination') }}
					</th>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="d-flex justify-content-end">
		<div class="p-2">
			<a class="btn btn-info" href="{{ url('/departamentos/create') }}">
				Alta de Almacén    
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