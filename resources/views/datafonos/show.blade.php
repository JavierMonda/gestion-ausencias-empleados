@extends('layouts.master')

@section('content')

  <div class="container">

        
      <div class="card bg-light">
        <div class="card-header">
          <h4>{{ $datafono->numTPV }}</h4>
        </div>
        <div class="card-body">
          <h5 class="card-title">Datos del Datafono:</h5>
          <p class="card-text">Número TPV: {{ $datafono->numTPV }}</p>
          <p class="card-text">Número Comercio: {{ $datafono->numComercio }}</p>
          <p class="card-text">Banco: {{ $datafono->banco }}</p>
          <p class="card-text">Tipo de Conexión: {{ $datafono->conexion }}</p>
          <p class="card-text">Centro donde se ubica: {{ $datafono->idCentroDatafonos }}</p>
          <div class="d-flex justify-content-end">
          <div class="p-2">
            <a class="btn btn-warning" href="{{ url('/datafonos/'. $datafono->id .'/edit/') }}">
              Editar
            </a>
          </div>
          <div class="p-2">
            <form action="{{ action('DatafonoController@destroy', $datafono->id) }}" method="POST">
              {{ method_field('PUT') }}
              {!! csrf_field() !!}
              <button type="submit" class="btn btn-danger">
                  Borrar
              </button>
            </form>
          </div>
          <div class="p-2">
            <a class="btn btn-secondary" href="{{ url('datafonos') }}">
              &lt; Volver
            </a>
          </div>
          </div>
        </div>
      </div>
   
  </div>

@stop