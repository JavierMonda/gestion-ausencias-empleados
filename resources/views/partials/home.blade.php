@extends('layouts.master-home')
@section('content')
<div class="row justify-content-md-center">
  <div class="col-lg-12 text-center">
    <h1 class="mt-5">Gestión Ausencias de Empleados</h1>
    <img src="img/logo_GAE.png" alt="Gestión de Ausencias de Empleados - GAE" />
    <p class="intro">Pulsa el siguiente botón para acceder a la aplicación. <br>
    	Una vez logueado se le redirigirá a su Departamento.
    </p>
    <a class="btn btn-info" href="{{ url('login') }}">
      Acceder
    </a>
  </div>
</div>
@stop