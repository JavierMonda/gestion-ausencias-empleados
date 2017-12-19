@extends('layouts.master')

@section('content')

  <div class="container">
    <div class="card bg-light">
      <div class="card-header">
        <h4>{{ $trabajador->nombreApellidos }}</h4>
      </div>
      <div class="card-body">
        <h5 class="card-title">Datos del Trabajador:</h5>
        <p class="card-text">ID: {{ $trabajador->id }}</p>
        <p class="card-text">DNI: {{ $trabajador->DNI }}</p>
        <p class="card-text">Foto: <img class="img img-responsive" src="{{ asset($trabajador->foto) }}" style="height: 50px;width: 50px"/></p>
        <p class="card-text">Nombre: {{ $trabajador->nombreApellidos }}</p>
        <p class="card-text">Inicio Contrato: {{ $trabajador->FechaIni }}</p>
        <p class="card-text">Fin Contrato: {{ $trabajador->FechaFin }}</p>
        <p class="card-text">Observaciones: {{ $trabajador->Observaciones }}</p>
        <p class="card-text">Tipo de Contrato: {{ $trabajador->tipoContrato }}</p>
        <p class="card-text">Vacaciones pendientes: {{ $trabajador->vacaciones - $vacaciones }}</p>
        <p class="card-text">Almacén: {{ $trabajador->nombreDepartamento }}</p>
        <table class="table table-hover">
          <thead class="thead-inverse">
            <tr>
              <th class="text-center" colspan="4">Días consumidos</th>
            </tr>
          </thead>
          <thead>
            <tr>
              <th class="text-center">Vacaciones</th>
              <th class="text-center">Bajas</th>
              <th class="text-center">Permisos</th>
              <th class="text-center">Faltas de asistencia</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th class="text-center">{{ $vacaciones }}</th>
              <th class="text-center">{{ $baja }}</th>
              <th class="text-center">{{ $permiso }}</th>
              <th class="text-center">{{ $absentismo }}</th>
            </tr>
          </tbody>
        </table>
        <div class="d-flex justify-content-end">
          <div class="p-2">
            <a class="btn btn-success" href="{{ url('/ausencias/create') }}">
              Alta de Ausencia
            </a>
          </div>
          <div class="p-2">
            <a class="btn btn-warning" href="{{ url('/trabajadores/'. $trabajador->id .'/edit/') }}">
              Editar
            </a>
          </div>
          <div class="p-2">
            <form action="{{ action('TrabajadorController@destroy', $trabajador->id) }}" method="POST">
              {{ method_field('PUT') }}
              {!! csrf_field() !!}
              <button type="submit" class="btn btn-danger">
                Borrar
              </button>
            </form>
          </div>
          <div class="p-2">
            <a class="btn btn-secondary" href="{{ URL::previous() }}">
              &lt; Volver
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

@stop