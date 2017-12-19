@extends('layouts.master')
@section('content')

	<div class="container">
		<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		  Usuario <strong>{{ Auth::user()->name }}</strong> conectado. Bienvenido/a!!
		</div>
		<div class="d-flex justify-content-center">
			<div class="p-2 text-center" style="border-bottom: 1px solid blue;margin-bottom: 20px;">
				<h4 class="card-title">Recursos Humanos</h4>
			</div>
		</div>
		<div class="row justify-content-md-center">
			<div class="col-md-4 card bg-light justify-content-md-start" style="margin-right: 15px" >
				<div class="card-header">
					<h4>Trabajadores</h4>		
				</div>
				<div class="card-body">	
					<p class="card-text text-center">
						<i class="fa fa-user-o fa-5x"></i>
					</p>
				</div>
				<a class="btn btn-light" href="{{ url('trabajadores') }}">
			      Gestionar Trabajadores ->
			    </a>
				<!--
				<div class="card-body">
					<h5 class="card-title">
						Importar excel
					</h5>
				    <form class="form" method="post" action="{{url('import-excel')}}" enctype="multipart/form-data">
				        {{csrf_field()}}
				        <div class="form-group">
					        <label for="descripcion">Selecciona el documento Excel a importar</label>
					        <input type="file" name="excel" class="form-control">
					    </div>
					    <div class="d-flex justify-content-end">
							<div class="p-2">
								<button type="submit" class="btn btn-primary">
									Enviar
								</button>
							</div>
						</div>
				    </form>
				</div>
				-->
			</div>
			<div class="col-md-4 card bg-light justify-content-md-end" style="margin-right: 15px">
				<div class="card-header">
					<h4>Ausencias</h4>		
				</div>
				<div class="card-body">	
					<p class="card-text text-center">
						<i class="fa fa-briefcase fa-5x" aria-hidden="true"></i>
					</p>
				</div>
				<a class="btn btn-light" href="{{ url('ausencias') }}">
			      Gestionar Ausencias ->
			    </a>
			</div>
			<div class="col-md-6 card bg-light justify-content-md-center" style="margin-right: 15px">
				<div class="card-header text-center">
					<h4>Ausencias de hoy</h4> <span><i class="fa fa-calendar" aria-hidden="true"></i> {{$date}}</span>		
				</div>
				<table class="table tabla table-hover">
					<thead class="thead-inverse">
						<tr>
							<th class="text-center">Tipo de Ausencia</th>
							<th class="text-center">Trabajador</th>
						</tr>
					</thead>
					<tbody>
						
						@foreach ( $trabajador as $t )
						<tr>
							@if ($t->tipoAusencia == 'vacaciones')
							<td class="text-center" style="background-color: green;color: black">{{$t->tipoAusencia}}</td>
							@elseif ($t->tipoAusencia == 'baja')
							<td class="text-center" style="background-color: blue;color: white">{{$t->tipoAusencia}}</td>
							@elseif ($t->tipoAusencia == 'permiso')
							<td class="text-center" style="background-color: yellow; color: black">{{$t->tipoAusencia}}</td>
							@elseif ($t->tipoAusencia == 'absentismo')
							<td class="text-center" style="background-color: red; color:white">{{$t->tipoAusencia}}</td>
							@endif
							<td class="text-center">{{$t->nombreApellidos}}</td>
						</tr>
						@endforeach
						
						
					</tbody>
				</table>
			</div>
		</div>
		<div class="box-header col-md-12">{{ $trabajador->links('pagination') }}</div>
	</div>
@stop