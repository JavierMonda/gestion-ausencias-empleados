@extends('layouts.master')

@section('content')

<div class="container">
	<div class="d-flex justify-content-start">
		<div class="p-2">
			<h4 class="card-title">Listado de Ausencias</h4>
		</div>
	</div>
	<form class="form" enctype="multipart/form-data" method="POST" action="">
		{{ csrf_field() }}
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
			@foreach ( $ausencia as $a )
			
				<tbody>
					<tr>
						<td class="text-center">{{$a->fechaAusencia}}</td>
						<td class="text-center">{{$a->tipoAusencia}}</td>
						<td class="text-center">{{$a->descripcion}}</td>
						<td class="text-center">{{$a->nombreApellidos}}</td>
						<td class="text-center">
							<a class="btn btn-success btn-sm" href="{{ url('/ausencias/' . $a->id ) }}">
					            Ver    
					        </a>
					    </td>
					    <td class="text-center">
					        <form method="POST" action="{{ action('AusenciaController@destroy', $a->id) }}" >
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
		<div class="d-flex justify-content-start">{{ $ausencia->links('pagination') }}</div>
	</form>
	<div class="d-flex justify-content-end">
		<div class="p-2">
			<a class="btn btn-info" href="{{ url('/ausencias/create') }}">
				Alta de Ausencia    
			</a>
		</div>
		<div class="p-2">
			<a class="btn btn-secondary" href="{{ URL::previous() }}">
				&lt; Volver
			</a>
		</div>
	</div>
	<div id="calendar"></div>
</div>
 	

@stop