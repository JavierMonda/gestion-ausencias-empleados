@extends('layouts.master')

@section('content')

<div class="container">

		<div class="card bg-light">

			<div class="card-header">
				<h4>Creación de nuevo Datáfono</h4>		
			</div>
			<div class="card-body">
				<h5 class="card-title">
					Ingrese todos los datos y pulse Añadir:
				</h5>
				
				<form class="form" enctype="multipart/form-data" method="POST" action="">
					{{ csrf_field() }}

    				<div class="form-group">
    					<label for="numTPV">Número de TPV</label>
    					<input type="text" name="numTPV" id="numTPV" class="form-control" placeholder="Ingrese el número de TPV">
					</div>
				    <div class="form-group">
    					<label for="numComercio">Número de Comercio</label>
    					<input type="text" name="numComercio" id="numComercio" class="form-control" placeholder="Ingrese el número de Comercio">
					</div>
					<div class="form-group">
    					<label for="banco">Banco</label>
    					<input type="text" name="banco" id="banco" class="form-control" placeholder="Ingrese el Banco">
					</div>

					<div class="form-group">
    					<label for="conexion">Tipo de Conexión</label>
    					<input type="text" name="conexion" id="conexion" class="form-control" placeholder="Tipo de conexión: gprs o ethernet">
					</div>

					<div class="form-group">
    					<label for="idCentroDatafonos">ID del Centro donde se ubica</label>
    					<input type="number" name="idCentroDatafonos" id="idCentroDatafonos" class="form-control" placeholder="Ingrese el ID">
					</div>

					<div class="d-flex justify-content-end">
						<div class="p-2">
							<button type="submit" class="btn btn-primary">
								Añadir
							</button>
						</div>
						<div class="p-2">
							<a class="btn btn-secondary" href="{{ url('datafonos') }}">
					          &lt; Volver
					        </a>
				        </div>
				    </div>
				</form>

				
			</div>
		</div>
	</div>



@stop