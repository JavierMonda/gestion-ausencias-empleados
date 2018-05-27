@extends('layouts.master')

@section('content')

  <div class="container">


      <div class="card bg-light">
        <div class="card-header">
          <h4>{{ $departamento->nombreDepartamento }}</h4>
        </div>
        <div class="card-body">
          <h5 class="card-title">Datos del Departamento:</h5>
          <p class="card-text">ID: {{ $departamento->id }}</p>
          <p class="card-text">Nombre: {{ $departamento->nombreDepartamento }}</p>
          <p class="card-text">Teléfono: {{ $departamento->TlfDepartamento }}</p>
          <p class="card-text">Responsable: {{ $departamento->JefeDepartamento }}</p>
          <p class="card-text">Departamento al que pertenece: {{ $departamento->nombreCentro }}</p>
          <div class="d-flex justify-content-end">
          <div class="p-2">
            <a class="btn btn-warning" href="{{ url('/departamentos/'. $departamento->id .'/edit/') }}">
              Editar
            </a>
          </div>
          <div class="p-2">
            <form action="{{ action('DepartamentoController@destroy', $departamento->id) }}" method="POST">
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

        <p>{{ $trabajador->nombreApellidos }}</p>
      </div>
        <div id="calendar"></div>
  </div>

@stop
