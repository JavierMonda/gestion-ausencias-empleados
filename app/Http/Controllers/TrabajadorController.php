<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Yajra\Datatables\Datatables;
use Redirect;
use App\Departamento;
use App\Trabajador;
use App\Ausencia;
use App\Centro;

class TrabajadorController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trabajador = DB::table('trabajadores')
                    ->join('departamentos', 'departamentos.id', '=', 'trabajadores.idDepartamentoTrabajador')
                    ->select('trabajadores.id','DNI','foto','nombreApellidos','FechaIni','FechaFin','Observaciones','tipoContrato','vacaciones','departamentos.nombreDepartamento')
                    ->paginate(5);
        $date = Carbon::now();
        $date = date('d m Y',strtotime($date));
        $ausencia = Ausencia::all();
        $departamento = Departamento::all();
        $centro = Centro::all();
        return view('trabajadores.index',compact('trabajador', 'date', 'ausencia', 'departamento', 'centro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trabajador = Trabajador::all();
        $departamento = Departamento::all();
        
        return view('trabajadores.create',['trabajador' => $trabajador], ['departamento' => $departamento]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = Carbon::createFromDate(2017, 12, 31);
        //$date->format('d-m-Y');
        $fechaInicio = $request->input('FechaIni');
        $fecha = Carbon::createFromFormat('Y-m-d', $fechaInicio);
        //$fecha->format('d-m-Y');
        $nombreDepartamento = $request->input('nombreDepartamento');
        $departamento = DB::table('departamentos')
                    ->where('nombreDepartamento','=',$nombreDepartamento)
                    ->select('*')
                    ->first();
        $trabajador = new Trabajador;
        $trabajador->DNI = '00000000A';
        //$trabajador->foto = $request->input('foto');
        $trabajador->nombreApellidos = $request->input('nombreApellidos');
        $trabajador->FechaIni = $fecha;
        $trabajador->FechaFin = $date;
        $trabajador->Observaciones = $request->input('Observaciones');
        $trabajador->tipoContrato = 'comercio';
        $trabajador->vacaciones = 30;
        $trabajador->idDepartamentoTrabajador = $departamento->id;
        if ($request->hasFile('foto')) {
            $nombreImg = $request->file('foto')->getClientOriginalName();
            $foto = $request->foto->storeAs('/img', $nombreImg);
            $trabajador->foto = $foto;
        }else {
            $trabajador->foto = '/img/Imagen_no_disponible.svg.png';
        }
        $trabajador->save();

        return redirect()->action('TrabajadorController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trabajador = DB::table('trabajadores')
                    ->where('trabajadores.id','=',$id)
                    ->join('departamentos', 'departamentos.id', '=', 'trabajadores.idDepartamentoTrabajador')
                    ->select('trabajadores.id','DNI','foto','nombreApellidos','FechaIni','FechaFin','Observaciones','tipoContrato','vacaciones','departamentos.nombreDepartamento')
                    ->first();

        $baja = DB::table('ausencias')
                        ->where('idTrabajador','=',$id)
                        ->where('tipoAusencia','=','baja')
                        ->count('id');
        $vacaciones = DB::table('ausencias')
                        ->where('idTrabajador','=',$id)
                        ->where('tipoAusencia','=','vacaciones')
                        ->count('id');
        $permiso = DB::table('ausencias')
                        ->where('idTrabajador','=',$id)
                        ->where('tipoAusencia','=','permiso')
                        ->count('id');
        $absentismo = DB::table('ausencias')
                        ->where('idTrabajador','=',$id)
                        ->where('tipoAusencia','=','absentismo')
                        ->count('id');

        return view('trabajadores.show', compact('trabajador', 'baja', 'permiso', 'vacaciones', 'absentismo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trabajador = DB::table('trabajadores')
                    ->where('trabajadores.id','=',$id)
                    ->join('departamentos', 'departamentos.id', '=', 'trabajadores.idDepartamentoTrabajador')
                    ->select('trabajadores.id','DNI','foto','nombreApellidos','FechaIni','FechaFin','Observaciones','tipoContrato','vacaciones','departamentos.nombreDepartamento')
                    ->first();
        $departamento = Departamento::all();
        return view('trabajadores.edit', ['trabajador' => $trabajador], ['departamento' => $departamento]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function putEdit(Request $request, $id) {
        $nombreDepartamento = $request->input('nombreDepartamento');
        $departamento = DB::table('departamentos')
                    ->where('nombreDepartamento','=',$nombreDepartamento)
                    ->select('*')
                    ->first();
        $trabajador = Trabajador::findOrFail($id);
        $trabajador->DNI = $request->input('DNI');
        //$trabajador->foto = $request->input('foto');
        $trabajador->nombreApellidos = $request->input('nombreApellidos');
        $trabajador->FechaIni = $request->input('FechaIni');
        $trabajador->FechaFin = $request->input('FechaFin');
        $trabajador->Observaciones = $request->input('Observaciones');
        $trabajador->tipoContrato = $request->input('tipoContrato');
        $trabajador->vacaciones = $request->input('vacaciones');
        $trabajador->idDepartamentoTrabajador = $departamento->id;
        if ($request->hasFile('foto')) {
            $nombreImg = $request->file('foto')->getClientOriginalName();
            $foto = $request->foto->storeAs('/img', $nombreImg);
            $trabajador->foto = $foto;
        }
        $trabajador->save();
        return redirect()->action('TrabajadorController@show',['id'=>$trabajador]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function trabajadorList(Request $request)
    {
        if($request->has('search')){
            $trabajador = DB::table('trabajadores')
                    ->join('departamentos', 'departamentos.id', '=', 'trabajadores.idDepartamentoTrabajador')
                    ->where('nombreApellidos', 'LIKE', '%'.$request->search.'%' )
                    ->orwhere('departamentos.nombreDepartamento', 'LIKE', '%'.$request->search.'%' )
                    ->select('trabajadores.id','DNI','foto','nombreApellidos','FechaIni','FechaFin','Observaciones','tipoContrato','vacaciones','departamentos.nombreDepartamento')
                    ->paginate(5);
            
            $date = Carbon::now();
            $date = date('d m Y',strtotime($date));
            $ausencia = Ausencia::all();
            $departamento = Departamento::all();
        }
        elseif($request->has('search2')){
            $trabajador = DB::table('trabajadores')
                    ->join('departamentos', 'departamentos.id', '=', 'trabajadores.idDepartamentoTrabajador')
                    ->where('departamentos.nombreDepartamento', 'LIKE', $request->search2)
                    ->select('trabajadores.id','DNI','foto','nombreApellidos','FechaIni','FechaFin','Observaciones','tipoContrato','vacaciones','departamentos.nombreDepartamento')
                    ->paginate(5);
            $date = Carbon::now();
            $date = date('d m Y',strtotime($date));
            $ausencia = Ausencia::all();
            $departamento = Departamento::all();
            $centro = Centro::all();
        }
        elseif($request->has('search3')){
            $trabajador = DB::table('trabajadores')
                    ->join('departamentos', 'departamentos.id', '=', 'trabajadores.idDepartamentoTrabajador')
                    ->join('centros', 'centros.id', '=', 'departamentos.idCentroDepartamento')
                    ->where('centros.nombreCentro', 'LIKE', $request->search3)
                    ->select('trabajadores.id','DNI','foto','nombreApellidos','FechaIni','FechaFin','Observaciones','tipoContrato','vacaciones','departamentos.nombreDepartamento','centros.nombreCentro')
                    ->paginate(5);
            $date = Carbon::now();
            $date = date('d m Y',strtotime($date));
            $ausencia = Ausencia::all();
            $departamento = Departamento::all();
            $centro = Centro::all();
        }
        else{
            $trabajador = DB::table('trabajadores')
                    ->join('departamentos', 'departamentos.id', '=', 'trabajadores.idDepartamentoTrabajador')
                    ->select('trabajadores.id','DNI','foto','nombreApellidos','FechaIni','FechaFin','Observaciones','tipoContrato','vacaciones','departamentos.nombreDepartamento')
                    ->paginate(5);
            $date = Carbon::now();
            $date = date('d m Y',strtotime($date));
            $ausencia = Ausencia::all();
            $departamento = Departamento::all();
            $centro = Centro::all();
        }
        return view('trabajadores.list',compact('trabajador', 'date', 'ausencia', 'departamento','centro'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trabajador = Trabajador::find($id);
        $trabajador->delete();
        return redirect()->action('TrabajadorController@index');
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
        return redirect()->action('TrabajadorController@index');
    }  

    /*public function getTrabajadores()
    {
        $trabajadores = Trabajador::select(['nombreApellidos','idDepartamentoTrabajador','vacaciones']);
 
        return Datatables::of($trabajadores)
 
            ->make(true);
    } */
}
