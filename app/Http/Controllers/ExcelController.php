<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

use App\Trabajador;

class ExcelController extends Controller
{
    public function importTrabajadores(Request $request)
	{
		$dateIni = Carbon::createFromDate(2017, 01, 01);
		$dateFin = Carbon::createFromDate(2017, 12, 31);

	    \Excel::load($request->excel, function($reader) {

	        $excel = $reader->get();

	        // iteracción
	        //$reader->each(function($row) {
	        foreach ($reader as $row) {
	            $trabajador = new Trabajador;
		        $trabajador->DNI = '00000000A';
		        //$trabajador->foto = $request->input('foto');
		        $trabajador->nombreApellidos = $row->nombre;
		        $trabajador->FechaIni = $dateIni;
		        $trabajador->FechaFin = $dateFin;
		        //$trabajador->Observaciones = $request->input('Observaciones');
		        $trabajador->tipoContrato = 'comercio';
		        $trabajador->vacaciones = 30;
		        $trabajador->idDepartamentoTrabajador = $row->id;
		        $trabajador->save();

	        }
	    
	    });

	    return "Terminado";
	}
}
