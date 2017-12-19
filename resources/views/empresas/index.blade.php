@extends('layouts.master')

@section('content')

<div class="container">
	<div class="d-flex justify-content-center">
		<div class="p-2 text-center" style="border-bottom: 1px solid blue;">
			<i class="fa fa-briefcase fa-5x" aria-hidden="true"></i>
			<h4 class="card-title">Empresas</h4>
		</div>
	</div>
	<div class="d-flex justify-content-center">

		<table class="table table-hover">
			<thead class="thead-inverse">
				<tr>
					<th class="text-center">ID</th>
					<th class="text-center">Nombre</th>
					<th class="text-center">CIF</th>
					<th class="text-center"></th>
				</tr>
			</thead>
		@foreach ( $empresa as $e )
        	
				<tr>
					<td class="text-center">{{$e->id}}</td>
					<td class="text-center">{{$e->nombreEmpresa}}</td>
					<td class="text-center">{{$e->CIF}}</td>
					<td class="text-center"><a class="btn btn-success btn-sm" href="{{ url('/empresas/' . $e->id ) }}">
				            Ver    
				        </a>
				    </td>
				</tr>

		@endforeach
		</table>
	</div>
	<div class="d-flex justify-content-start">{{ $empresa->links('pagination') }}</div>
	<div class="d-flex justify-content-end">
		<div class="p-2">
			<a class="btn btn-info" href="{{ url('/empresas/create') }}">
				Crear Empresa    
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