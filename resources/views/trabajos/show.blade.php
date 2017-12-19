@extends('layouts.master')

@section('content')

  <div class="container">

        
      <div class="card bg-light">
        <div class="card-header">
          <h4>{{ $trabajo->id }}</h4>
        </div>
        <div class="card-body">
          <h5 class="card-title">Datos de la empresa:</h5>
          <p class="card-text">ID: {{ $trabajo->id }}</p>
          <p class="card-text">Descripción: {{ $trabajo->descripcionTrabajos }}</p>
          <div class="d-flex justify-content-end">
          <div class="p-2">
            <a class="btn btn-warning" href="{{ url('/trabajos/'. $trabajo->id .'/edit/') }}">
              Editar
            </a>
          </div>
          <div class="p-2">
            <form action="{{ action('TrabajoController@destroy', $trabajo->id) }}" method="POST">
              {{ method_field('PUT') }}
              {!! csrf_field() !!}
              <button type="submit" class="btn btn-danger">
                  Borrar
              </button>
            </form>
          </div>
          <div class="p-2">
            <a class="btn btn-secondary" href="{{ url('trabajos') }}">
              &lt; Volver
            </a>
          </div>
          </div>
        </div>
      </div>
   
  </div>

@stop