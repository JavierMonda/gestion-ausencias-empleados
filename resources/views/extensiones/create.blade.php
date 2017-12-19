@extends('layouts.master')

@section('content')

<div class="container">

		<div class="card bg-light">

			<div class="card-header">
				<h4>Creación de nueva Extensión</h4>		
			</div>
			<div class="card-body">
				<h5 class="card-title">
					Ingrese todos los datos y pulse Añadir:
				</h5>
				
				<form class="form" enctype="multipart/form-data" method="POST" action="">
					{{ csrf_field() }}

    				<div class="form-group">
    					<label for="numero">Número de Extensión</label>
    					<input type="number" name="numero" id="numero" class="form-control" placeholder="Ingrese el número de extensión">
					</div>
				    <div class="form-group">
    					<label for="numPuerto">Número de Puerto</label>
    					<input type="number" name="numPuerto" id="numPuerto" class="form-control" placeholder="Ingrese el número de puerto">
					</div>
					<div class="form-group">
    					<label for="idDepartamento">Departamento</label>
    					<input type="number" name="idDepartamento" id="idDepartamento" class="form-control" placeholder="Ingrese el ID del departamento">
					</div>
					<div class="d-flex justify-content-end">
						<div class="p-2">
							<button type="submit" class="btn btn-primary">
								Añadir
							</button>
						</div>
						<div class="p-2">
							<a class="btn btn-secondary" href="{{ url('extensiones') }}">
					          &lt; Volver
					        </a>
				        </div>
				    </div>
				</form>

				
			</div>
		</div>
	</div>



@stop