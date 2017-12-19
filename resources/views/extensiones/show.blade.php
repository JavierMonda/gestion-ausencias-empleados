@extends('layouts.master')

@section('content')

  <div class="container">

        
      <div class="card bg-light">
        <div class="card-header">
          <h4>Extensión {{ $extension->numero }}</h4>
        </div>
        <div class="card-body">
          <h5 class="card-title">Datos de la extensión:</h5>
          <p class="card-text">ID: {{ $extension->id }}</p>
          <p class="card-text">Número: {{ $extension->numero }}</p>
          <p class="card-text">Puerto: {{ $extension->numPuerto }}</p>
          <p class="card-text">Departamento al que pertenece: {{ $extension->idDepartamento }}</p>
          <div class="d-flex justify-content-end">
          <div class="p-2">
            <a class="btn btn-warning" href="{{ url('/extensiones/'. $extension->id .'/edit/') }}">
              Editar
            </a>
          </div>
          <div class="p-2">
            <form action="{{ action('ExtensionController@destroy', $extension->id) }}" method="POST">
              {{ method_field('PUT') }}
              {!! csrf_field() !!}
              <button type="submit" class="btn btn-danger">
                  Borrar
              </button>
            </form>
          </div>
          <div class="p-2">
            <a class="btn btn-secondary" href="{{ url('extensiones') }}">
              &lt; Volver
            </a>
          </div>
          </div>
        </div>
      </div>
   
  </div>

@stop