@extends('layouts.master')

@section('content')

<div class="container">

		<div class="card bg-light">

			<div class="card-header">
				<h4>Creación de nueva Empresa</h4>		
			</div>
			<div class="card-body">
				<h5 class="card-title">
					Ingrese todos los datos y pulse Añadir:
				</h5>
				
				<form class="form" enctype="multipart/form-data" method="POST" action="">
					{{ csrf_field() }}

    				<div class="form-group">
    					<label for="CIF">CIF</label>
    					<input type="text" name="CIF" id="CIF" class="form-control" placeholder="Ingrese el CIF de la empresa">
					</div>

				    <div class="form-group">
    					<label for="nombreEmpresa">Nombre</label>
    					<input type="text" name="nombreEmpresa" id="nombreEmpresa" class="form-control" placeholder="Ingrese el Nombre de la Empresa">
					</div>
					<div class="d-flex justify-content-end">
						<div class="p-2">
							<button type="submit" class="btn btn-primary">
								Añadir
							</button>
						</div>
						<div class="p-2">
							<a class="btn btn-secondary" href="{{ URL::previous() }}">
					          &lt; Volver
					        </a>
				        </div>
				    </div>
				</form>

				
			</div>
		</div>
	</div>



@stop