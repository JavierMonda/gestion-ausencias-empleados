@extends('layouts.master')

@section('content')

<div class="container">

		<div class="card bg-light">

			<div class="card-header">
				<h4>Añadir Teléfono de trabajador</h4>		
			</div>
			<div class="card-body">
				<h5 class="card-title">
					Ingrese todos los datos y pulse Añadir:
				</h5>
				
				<form class="form" enctype="multipart/form-data" method="POST" action="">
					{{ csrf_field() }}

    				<div class="form-group">
    					<label for="idTrabajadorTlf">ID del Trabajador</label>
    					<input type="number" name="idTrabajadorTlf" id="idTrabajadorTlf" class="form-control" placeholder="ID Trabajdor">
					</div>

				    <div class="form-group">
    					<label for="TlfTrabajador">Teléfono</label>
    					<input type="text" name="TlfTrabajador" id="TlfTrabajador" class="form-control" placeholder="Ingrese el Teléfono">
					</div>
					<div class="d-flex justify-content-end">
						<div class="p-2">
							<button type="submit" class="btn btn-primary">
								Añadir
							</button>
						</div>
						<div class="p-2">
							<a class="btn btn-secondary" href="{{ url('trabajadorltlfs') }}">
					          &lt; Volver
					        </a>
				        </div>
				    </div>
				</form>

				
			</div>
		</div>
	</div>



@stop