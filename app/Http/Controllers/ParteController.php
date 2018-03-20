<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Redirect;

use App\Trabajador;
use App\Parte;
use App\Ausencia;

class ParteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parte2 = Parte::all();
        $parte = DB::table('partes')
                    ->join('ausencias', 'ausencias.idParte', '=', 'partes.id')
                    ->join('trabajadores', 'trabajadores.id', '=', 'ausencias.idTrabajador')
                    ->select('partes.id','inicio','fin','trabajadores.nombreApellidos')
                    ->distinct()
                    ->paginate(5);


        return view('partes.index', compact('parte','parte2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parte = Parte::all();
        $trabajador = Trabajador::all();
        $ausencia = Ausencia::all();

        return view('partes.create',['parte' => $parte], ['trabajador' => $trabajador], ['ausencia' => $ausencia]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trabajador = DB::table('trabajadores')
                    ->where('id','=',$request->input('idTrabajador'))
                    ->select('*')
                    ->first();
        $id = $request->input('idTrabajador');

        $fecha1 = $request->input('fecha1');
        $fecha2 = $request->input('fecha2');

        $parte = new Parte;
        $parte->inicio = Carbon::createFromFormat('Y-m-d', $fecha1);
        $parte->fin = Carbon::createFromFormat('Y-m-d', $fecha2);
        $parte->save();

        for($i=$fecha1;$i<=$fecha2;$i = date("Y-m-d", strtotime($i ."+ 1 days"))){
            $fecha = Carbon::createFromFormat('Y-m-d', $i);
            $ausencia = new Ausencia;
            $ausencia->fechaAusencia = $fecha;
            $ausencia->tipoAusencia = $request->input('tipoAusencia');

            if ($request->input('tipoAusencia') == 'vacaciones') {
                $trabajador = Trabajador::findOrFail($id);
                $trabajador->save();
            }
            $ausencia->descripcion = $request->input('descripcion');
            $ausencia->idTrabajador = $trabajador->id;
            $ausencia->idParte = $parte->id;
            $ausencia->save();
        }


        //return redirect()->action('ParteController@index');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parte  $parte
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $numParte = $id;
        $parte = DB::table('partes')
                    ->where('partes.id','=',$id)
                    ->join('ausencias', 'ausencias.idParte', '=', 'partes.id')
                    ->join('trabajadores', 'trabajadores.id', '=', 'ausencias.idTrabajador')
                    ->select('partes.id as id','ausencias.id as idAusencia','ausencias.fechaAusencia','ausencias.tipoAusencia','ausencias.descripcion','trabajadores.nombreApellidos')
                    ->get();
        return view('partes.show',compact('parte','numParte'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parte  $parte
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parte  $parte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        self::destroy($id);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parte  $parte
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parte = Parte::find($id);
        $parte->delete();
        return back();
    }
}
