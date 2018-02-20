@extends('layouts.master2')

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
        <p class="card-text">Le pertenecen un total de {{$trabajador->vacaciones}} días de vacaciones</p>
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
        <table class="table table-hover">
          <thead class="thead-inverse">
            <tr>
              <th class="text-center" colspan="5">Partes de Ausencia</th>
            </tr>
          </thead>
          <thead>
            <tr>
              <th class="text-center">Número de Parte</th>
              <th class="text-center">Fecha Inicio</th>
              <th class="text-center">Fecha Fin</th>
              <th class="text-center">Tipo de Ausencia</th>
              <th class="text-center"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($parte as $p)
            <tr>
              <th class="text-center">{{ $p->id }}</th>
              <th class="text-center">{{ $p->inicio }}</th>
              <th class="text-center">{{ $p->fin }}</th>
              <th class="text-center">{{ $p->tipoAusencia }}</th>
              <th class="text-center">
                <a class="btn btn-success btn-sm" href="{{ url('/partes/' . $p->id ) }}">
                  Ver
                </a>
              </th>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="d-flex justify-content-end">

          <div class="p-2">
          <!-- Modal Form-->
                <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Nuevo Parte</button>
                <!-- Modal-->
                <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                  <div role="document" class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 id="exampleModalLabel" class="modal-title">Nuevo Parte de ausencia</h4>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                      </div>
                      <div class="modal-body">
                        <form method="POST" action="{{ action('ParteController@store') }}">
                          {{ csrf_field() }}
                          <fieldset>
                            <legend>Trabajador: {{$trabajador->nombreApellidos}}</legend>
                          </fieldset>
                          <div class="form-group">
                    					<label for="fecha1">Fecha Inicio</label>
                    					<input type="date" name="fecha1" id="fecha1" class="form-control" placeholder="Fecha de Inicio">
                					</div>
                					<div class="form-group">
                    					<label for="fecha2">Fecha Fin</label>
                    					<input type="date" name="fecha2" id="fecha2" class="form-control" placeholder="Fecha de Fin">
                					</div>
                					<div class="form-group">
                						<label for="tipoAusencia">Seleccione Tipo</label>
                						<select class="custom-select form-control" name="tipoAusencia">
                							<option value="baja">
                								baja
                							</option>
                							<option value="vacaciones">
                								vacaciones
                							</option>
                							<option value="permiso">
                								permiso
                							</option>
                							<option value="absentismo">
                								ausencia
                							</option>
                						</select>
                					</div>
                				    <div class="form-group">
                    					<label for="descripcion">Descripción</label>
                    					<input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripción de la ausencia">
                					</div>
                					<div class="form-group">
                    					<label for="idTrabajador">ID del Trabajador</label>
                							<input type="text" name="idTrabajador" id="idTrabajador" class="form-control" placeholder="{{$trabajador->nombreApellidos}}" value="{{$trabajador->id}}">
                					</div>
                            <div class="form-group"><input type="submit" value="Enviar" class="btn btn-primary">
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Cerrar</button>
                        <!--<button type="button" class="btn btn-primary">Guardar</button>-->
                      </div>
                    </div>
                  </div>
                </div>
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
            <a class="btn btn-secondary" href="{{ url('/trabajadores') }}">
              &lt; Volver
            </a>
          </div>
        </div>
      </div>
    </div>
    <div id="calendar"></div>
  </div>


@endsection
