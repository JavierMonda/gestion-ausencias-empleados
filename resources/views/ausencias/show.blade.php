@extends('layouts.master')

@section('content')

  <div class="container">

        
      <div class="card bg-light">
        <div class="card-header">
          <h4>Ausencia {{ $ausencia->id }}</h4>
        </div>
        <div class="card-body">
          <h5 class="card-title">Datos de la ausencia:</h5>
          <p class="card-text">ID: {{ $ausencia->id }}</p>
          <p class="card-text">Fecha: {{ $ausencia->fechaAusencia }}</p>
          <p class="card-text">Tipo: {{ $ausencia->tipoAusencia }}</p>
          <p class="card-text">Descripción: {{ $ausencia->descripcion }}</p>
          <p class="card-text">Trabajador: {{ $ausencia->nombreApellidos }}</p>
          <div class="d-flex justify-content-end">
          <div class="p-2">
            <a class="btn btn-warning" href="{{ url('/ausencias/'. $ausencia->id .'/edit/') }}">
              Editar
            </a>
          </div>
          <div class="p-2">
            <form action="{{ action('AusenciaController@destroy', $ausencia->id) }}" method="POST">
              {{ method_field('PUT') }}
              {!! csrf_field() !!}
              <button type="submit" class="btn btn-danger btn-sm" onclick="
return confirm('¿Está seguro de eliminar esta ausencia?')">
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