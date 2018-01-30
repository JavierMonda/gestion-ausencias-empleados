@extends('layouts.master')

@section('content')

<div class="container">
	<div class="d-flex justify-content-center">
		<div class="p-2 text-center" style="border-bottom: 1px solid blue;margin-bottom: 20px;">
			<i class="fa fa-users fa-5x" style="margin-bottom: 10px;"></i>
			<h4 class="card-title">Empleados</h4>
		</div>
	</div>
	<div class="row">
		<div class="box-header col-md-12">
			<div class="row">
				<div class="col-md-6">
			    	<form method="GET" action="{{ route('trabajadores.list') }}">
                  <div class="form-group">
                  	<label for="search">Búsqueda por nombre</label>
                      <input type="text" name="search" class="form-control" placeholder="Introduzca nombre de empleado o departamento a buscar" value="{{ old('search') }}">
                  </div>
                <div class="form-group">
                    <button class="btn btn-success"><i class="fa fa-search"></i> Buscar nombre</button>
                </div>
            </form>
	            </div>

	            <div class="col-md-6">
		            <form method="GET" action="{{ route('trabajadores.list') }}">
		                	<div class="form-group">
		    					<label for="nombreDepartamento">Búsqueda por almacén</label>
								<select class="custom-select form-control" name="search2">
									<option value="%" default>Todos</option>
								@foreach ($departamento as $d)
									<option value="{{ $d->nombreDepartamento }}">
										{{ $d->nombreDepartamento }}
									</option>
								@endforeach
								</select>
							</div>
		                    <div class="form-group">
		                        <button class="btn btn-success"><i class="fa fa-search"></i> Buscar por Almacén</button>
		                    </div>
		            </form>
	        	</div>
            </div>
		</div>
		<div class="box-header col-md-12">
			<form method="GET" action="{{ route('trabajadores.list') }}">
            	<div class="form-group">
					<label for="nombreCentro">Búsqueda por Departamento</label>
					<select class="custom-select form-control" name="search3">
						<option value="%" default>Todos</option>
					@foreach ($centro as $c)
						<option value="{{ $c->nombreCentro }}">
							{{ $c->nombreCentro }}
						</option>
					@endforeach
					</select>
				</div>
                <div class="form-group">
                    <button class="btn btn-success"><i class="fa fa-search"></i> Buscar por Departamento</button>
                </div>
	        </form>
		</div>
		<div class="d-flex justify-content-start">
			<div class="alert-warning" style="padding-left: 10px; padding-top: 10px; padding-right: 10px; border-radius: 15px 15px 15px 15px">Leyenda del estado de ausencias de los empleados:
				<p>
					<a class="btn btn-success"></a> Vacaciones
					<a class="btn btn-warning"></a> Permiso
					<a class="btn btn-primary"></a> Baja
					<a class="btn btn-danger"></a> Ausencia
				</p>
			</div>
		</div>

		<table id="tabla" class="table tabla table-hover display">
			<thead class="thead-inverse">
				<tr>
					<th class="text-center">Estado</th>
					<th class="text-center">Nombre</th>
					<th class="text-center">Almacén</th>
					<th class="text-center">Vacaciones pendientes</th>
					<th class="text-center" colspan="3"></th>
				</tr>
			</thead>
			<tbody>
				<script>
					var i = 0;
				</script>
				@foreach ( $trabajador as $t )

				<tr>
					<td class="text-center estadoAusencia" style="background-color: white">En el trabajo</td>
					@foreach ( $ausencia as $a )

						@if ($a->idTrabajador == $t->id)
							@if ($a->fechaAusencia == date("Y-m-d"))
								@if ($a->tipoAusencia == 'baja')
									<script>
										document.getElementsByClassName('estadoAusencia')[i].style.backgroundColor = "blue";
										document.getElementsByClassName('estadoAusencia')[i].innerHTML = "Baja";
									</script>
								@elseif ($a->tipoAusencia == 'vacaciones')
									<script>
										document.getElementsByClassName('estadoAusencia')[i].style.backgroundColor = "green";
										document.getElementsByClassName('estadoAusencia')[i].innerHTML = "Vacaciones";
									</script>
								@elseif ($a->tipoAusencia == 'permiso')
									<script>
										document.getElementsByClassName('estadoAusencia')[i].style.backgroundColor = "yellow";
										document.getElementsByClassName('estadoAusencia')[i].innerHTML = "Permiso";
									</script>
								@elseif ($a->tipoAusencia == 'absentismo')
									<script>
										document.getElementsByClassName('estadoAusencia')[i].style.backgroundColor = "red";
										document.getElementsByClassName('estadoAusencia')[i].innerHTML = "Hoy no ha venido a trabajar!";
									</script>
								@endif
							@endif
						@endif
					@endforeach

					<td class="text-center">{{$t->nombreApellidos}}</td>
					<td class="text-center">{{$t->nombreDepartamento}}</td>
					<td class="text-center">{{$t->vacaciones - $vacaciones}}</td>
					<td class="text-center"><a class="btn btn-success btn-sm" href="{{ url('/trabajadores/' . $t->id ) }}">
				            <i class="fa fa-address-card" aria-hidden="true"></i>
				        </a>
				    </td>
				    <td class="text-center"><a class="btn btn-warning btn-sm" href="{{ url('/trabajadores/'. $t->id .'/edit/') }}">
		              <i class="fa fa-pencil"></i>
		            </a>
				    </td>
				    <td class="text-center">
				    	<form action="{{ action('TrabajadorController@destroy', $t->id) }}" method="POST">
			              {{ method_field('PUT') }}
			              {!! csrf_field() !!}
			            	<button type="submit" class="btn btn-danger btn-sm" onclick="
return confirm('¿Está seguro de eliminar este trabajador?')">
			                	<i class="fa fa-trash-o"></i>
			            	</button>
			            </form>
				    </td>
				</tr>
				<script>
					i++;
				</script>
			@endforeach


			</tbody>
		</table>
	</div>
	<div class="box-header col-md-12">{{ $trabajador->links('pagination') }}</div>
	<div class="d-flex justify-content-end">
		<div class="p-2">
			<a class="btn btn-info" href="{{ url('/trabajadores/create') }}">
				Crear Trabajador
			</a>
		</div>
		<div class="p-2">
		@if (auth()->user()->email == 'personal@fuerteventuraoasispark.com')
			<a class="btn btn-secondary" href="{{ URL::previous() }}">
				&lt; Volver
			</a>
		@else
			<a class="btn btn-secondary" href="{{ URL::previous() }}">
				&lt; Volver
			</a>
		@endif
		</div>
	</div>
</div>



@stop
