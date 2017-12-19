@extends('layouts.master')

@section('content')

  <div class="container">

        
      <div class="card bg-light">
        <div class="card-header">
          <h4>{{ $trabajadortlf->TlfTrabajador }}</h4>
        </div>
        <div class="card-body">
          <h5 class="card-title">Datos del teléfono:</h5>
          <p class="card-text">ID: {{ $trabajadortlf->id }}</p>
          <p class="card-text">ID trabajador: {{ $trabajadortlf->idTrabajadorTlf }}</p>
          <p class="card-text">Teléfono: {{ $trabajadortlf->TlfTrabajador }}</p>
          <div class="d-flex justify-content-end">
          <div class="p-2">
            <a class="btn btn-warning" href="{{ url('/trabajadortlfs/'. $trabajadortlf->id .'/edit/') }}">
              Editar
            </a>
          </div>
          <div class="p-2">
            <form action="{{ action('TrabajadortlfController@destroy', $trabajadortlf->id) }}" method="POST">
              {{ method_field('PUT') }}
              {!! csrf_field() !!}
              <button type="submit" class="btn btn-danger">
                  Borrar
              </button>
            </form>
          </div>
          <div class="p-2">
            <a class="btn btn-secondary" href="{{ url('trabajadortlfs') }}">
              &lt; Volver
            </a>
          </div>
          </div>
        </div>
      </div>
   
  </div>

@stop