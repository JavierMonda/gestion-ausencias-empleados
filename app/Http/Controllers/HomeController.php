<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use App\Trabajador;
use App\Ausencia;
use App\Departamento;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->email == 'personal@fuerteventuraoasispark.com') {
            $date = Carbon::now();
            $date = date('d m Y',strtotime($date));
            $ausencia = Ausencia::all();
            $trabajador = DB::table('ausencias')
                        ->join('trabajadores', 'trabajadores.id', '=', 'ausencias.idTrabajador')
                        ->where('ausencias.fechaAusencia', 'Like', date("Y-m-d").'%')
                        ->select('trabajadores.id','ausencias.idTrabajador','trabajadores.nombreApellidos', 'ausencias.tipoAusencia', 'ausencias.fechaAusencia')
                        ->paginate(10);

            $departamento = Departamento::all();
            return view('/rrhh',compact('trabajador','ausencia','date','departamento'));
        }
        elseif (auth()->user()->email == 'gestion@fuerteventuraoasispark.com') {
            $date = Carbon::now();
            $date = date('d m Y',strtotime($date));
            $ausencia = Ausencia::all();
            $trabajador = DB::table('ausencias')
                        ->join('trabajadores', 'trabajadores.id', '=', 'ausencias.idTrabajador')
                        ->where('ausencias.fechaAusencia', 'Like', date("Y-m-d").'%')
                        ->select('trabajadores.id','ausencias.idTrabajador','trabajadores.nombreApellidos', 'ausencias.tipoAusencia', 'ausencias.fechaAusencia')
                        ->paginate(10);

            $departamento = Departamento::all();
            return view('/rrhh',compact('trabajador','ausencia','date','departamento'));
        }
        elseif (auth()->user()->email == 'julian.hernandez@fuerteventuraoasispark.com')
            return view('/servicio-tecnico');
        elseif (auth()->user()->email == 'informatica@fuerteventuraoasispark.com')
            return view('/admin');
        else
        return view('/');
    }
}
