@extends('layouts.master')

@section('content')

<div class="container">
	<div class="d-flex justify-content-center">
		<div class="p-2 text-center" style="border-bottom: 1px solid blue;">
			<i class="fa fa-users fa-5x"></i>
			<h4 class="card-title">Empleados</h4>
		</div>
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
	<div class="row">
		<div class="box-header col-md-12">
			
		    <form method="GET" action="{{ route('trabajadores.list') }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="search" class="form-control" placeholder="Introduzca un nombre de Trabajador" value="{{ old('search') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
	                    <div class="form-group">
	                        <button class="btn btn-success"><i class="fa fa-search"></i> Buscar</button>
	                    </div>
	                </div>
                </div>
                <!--<div class="col-md-3 form-group">
					<label for="searchDepartamento">Selecciona Almacén</label>
					<select class="custom-select form-control" name="searchDepartamento">
						<option value="" default>
							
						</option>
					@foreach ($departamento as $d)					
						<option value="{{ $d->id }}">
							{{ $d->nombreDepartamento }}
						</option>							
					@endforeach
					</select>
				</div>-->
				
            </form>
		              
		</div>

		<table class="table table-hover">
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
				<th class="text-center estadoAusencia" style="background-color: white">En el trabajo</th>
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

					<th class="text-center">{{$t->nombreApellidos}}</th>
					<th class="text-center">{{$t->nombreDepartamento}}</th>
					<th class="text-center">{{$t->vacaciones}}</th>
					<th class="text-center"><a class="btn btn-success btn-sm" href="{{ url('/trabajadores/' . $t->id ) }}">
				            <i class="fa fa-address-card" aria-hidden="true"></i>    
				        </a>
				    </th>
				    <th class="text-center"><a class="btn btn-warning btn-sm" href="{{ url('/trabajadores/'. $t->id .'/edit/') }}">
		              <i class="fa fa-pencil"></i>
		            </a>
				    </th>
				    <th class="text-center">
				    	<form action="{{ action('TrabajadorController@destroy', $t->id) }}" method="POST">
			              {{ method_field('PUT') }}
			              {!! csrf_field() !!}
			            	<button type="submit" class="btn btn-danger btn-sm" onclick="
return confirm('¿Está seguro de eliminar este trabajador?')">
			                	<i class="fa fa-trash-o"></i>
			            	</button>
			            </form>
				    </th>
				</tr>
				<script>
					i++;
				</script>
			@endforeach
				<tr>
					<th class="text-center">
						<!--<nav aria-label="Page navigation example">
							<ul class="pagination">
								<li class="page-item">{{ $trabajador->links('pagination') }}</li>
							</ul>
						</nav>-->
						{{ $trabajador->links('pagination') }}
					</th>
				</tr>
				
			</tbody>

		</table>

	</div>
	<div class="d-flex justify-content-end">
		<div class="p-2">
			<a class="btn btn-info" href="{{ url('/trabajadores/create') }}">
				Crear Trabajador    
			</a>
		</div>
		<div class="p-2">
		@if (auth()->user()->email == 'personal@fuerteventuraoasispark.com') 
			<a class="btn btn-secondary" href="{{ url('/rrhh') }}">
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