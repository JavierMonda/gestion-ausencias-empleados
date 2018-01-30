@extends('layouts.master')

@section('content')

  <div class="container">
    <div class="d-flex justify-content-left">
      <h4>Parte número: {{$numParte}}</h4>
    </div>
    <div class="d-flex justify-content-center">

      <table class="table table-hover">
        <thead class="thead-inverse">
          <tr>
            <th class="text-center">Fecha</th>
            <th class="text-center">Tipo</th>
            <th class="text-center">Descripción</th>
            <th class="text-center">Trabajador</th>
            <th class="text-center" colspan="2"></th>
          </tr>
        </thead>
      @foreach ( $parte as $p )

        <tbody>
          <tr>
            <td class="text-center">{{$p->fechaAusencia}}</td>
            <td class="text-center">{{$p->tipoAusencia}}</td>
            <td class="text-center">{{$p->descripcion}}</td>
            <td class="text-center">{{$p->nombreApellidos}}</td>
            <td class="text-center">
              <a class="btn btn-success btn-sm" href="{{ url('/ausencias/' . $p->idAusencia ) }}">
                      Ver
                  </a>
              </td>
              <td class="text-center">
                  <form method="POST" action="{{ action('AusenciaController@destroy', $p->idAusencia) }}" >
                      {{ method_field('PUT') }}
                      {!! csrf_field() !!}
                      <button type="submit" class="btn btn-danger btn-sm" onclick="
return confirm('¿Está seguro de eliminar esta ausencia?')">
                        Borrar
                    </button>
                    </form>
              </td>
          </tr>
        </tbody>

      @endforeach
      </table>

  </div>

@stop
