@extends('layouts.master')

@section('content')

  <div class="container">

        
      <div class="card bg-light">
        <div class="card-header">
          <h4>{{ $centro->nombreCentro }}</h4>
        </div>
        <div class="card-body">
          <h5 class="card-title">Datos del Departamento:</h5>
          <p class="card-text">Nombre: {{ $centro->nombreCentro }}</p>
          <p class="card-text">Empresa a la que pertenece: {{ $centro->nombreEmpresa }}</p>
          <div class="d-flex justify-content-end">
          <div class="p-2">
            <a class="btn btn-warning" href="{{ url('/centros/'. $centro->id .'/edit/') }}">
              Editar
            </a>
          </div>
          <div class="p-2">
            <form action="{{ action('CentroController@destroy', $centro->id) }}" method="POST">
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