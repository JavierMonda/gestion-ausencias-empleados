@extends('layouts.master')
@section('content')

	<div class="container">
		<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		  Usuario <strong>{{ Auth::user()->name }}</strong> conectado. Bienvenido/a!!
		</div>
		<div class="row justify-content-md-center">
			<div class="col-md-4 card bg-light justify-content-md-end" style="margin-right: 15px">
				<div class="card-header">
					<h4>Empresas</h4>
				</div>
				<div class="card-body">
					<p class="card-text text-center">
						<i class="fa fa-briefcase fa-5x" aria-hidden="true"></i>
					</p>
				</div>
				<a class="btn btn-light" href="{{ url('empresas') }}">
			      Gestionar Empresas ->
			    </a>
			</div>
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
			</div>
			<div class="col-md-4 card bg-light justify-content-md-end" style="margin-right: 15px">
				<div class="card-header">
					<h4>Departamentos</h4>
				</div>
				<div class="card-body">
					<p class="card-text text-center">
						<i class="fa fa-archive fa-5x" aria-hidden="true"></i>
					</p>
				</div>
				<a class="btn btn-light" href="{{ url('centros') }}">
			      Gestionar Departamentos ->
			    </a>
			</div>
			<div class="col-md-4 card bg-light justify-content-md-end" style="margin-right: 15px">
				<div class="card-header">
					<h4>Almacenes</h4>
				</div>
				<div class="card-body">
					<p class="card-text text-center">
						<i class="fa fa-folder-open-o fa-5x" aria-hidden="true"></i>
					</p>
				</div>
				<a class="btn btn-light" href="{{ url('departamentos') }}">
			      Gestionar Almacenes ->
			    </a>
			</div>
		</div>
	</div>

@stop
