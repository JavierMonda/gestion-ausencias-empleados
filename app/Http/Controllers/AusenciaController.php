<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Ausencia;
use App\Trabajador;
use App\Parte;

class AusenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ausencia = DB::table('ausencias')
                    ->join('trabajadores', 'trabajadores.id', '=', 'ausencias.idTrabajador')
                    ->select('ausencias.id','fechaAusencia','tipoAusencia','descripcion','trabajadores.nombreApellidos')
                    ->paginate(5);
        $data = Ausencia::all();

        return view('ausencias.index',compact('ausencia','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ausencia = Ausencia::all();
        $trabajador = Trabajador::all();

        return view('ausencias.create',['ausencia' => $ausencia], ['trabajador' =>$trabajador]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombreApellidos = $request->input('nombreApellidos');
        $trabajador = DB::table('trabajadores')
                    ->where('nombreApellidos','=',$nombreApellidos)
                    ->select('*')
                    ->first();
        $id = $trabajador->id;

        $fecha1 = $request->input('fecha1');
        $fecha2 = $request->input('fecha2');

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
            $ausencia->save();
        }

        return redirect()->action('AusenciaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ausencia = DB::table('ausencias')
                    ->where('ausencias.id','=',$id)
                    ->join('trabajadores', 'trabajadores.id', '=', 'ausencias.idTrabajador')
                    ->select('ausencias.id','fechaAusencia','tipoAusencia','descripcion','trabajadores.nombreApellidos')
                    ->first();
        return view('ausencias.show',compact('ausencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ausencia = DB::table('ausencias')
                    ->where('ausencias.id','=',$id)
                    ->join('trabajadores', 'trabajadores.id', '=', 'ausencias.idTrabajador')
                    ->select('ausencias.id','fechaAusencia','tipoAusencia','descripcion','trabajadores.nombreApellidos')
                    ->first();
        return view('ausencias.edit', ['ausencia' => $ausencia]);
    }

    public function putEdit(Request $request, $id) {
        $ausencia = Ausencia::findOrFail($id);
        $ausencia->fechaAusencia = $request->input('fechaAusencia');
        $ausencia->tipoAusencia = $request->input('tipoAusencia');
        $ausencia->descripcion = $request->input('descripcion');
        $ausencia->save();
        return redirect()->action('AusenciaController@show',['id'=>$ausencia]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ausencia = Ausencia::find($id);
        $vacaciones = $ausencia->tipoAusencia;
        $idTrabajador = $ausencia->idTrabajador;

        if($vacaciones == 'vacaciones') {
          $trabajador = Trabajador::find($idTrabajador);
          $trabajador->vacaciones = $trabajador->vacaciones + 1;
          $trabajador->save();
        }
        $ausencia->delete();
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        self::destroy($id);
        return back();
    }
}
