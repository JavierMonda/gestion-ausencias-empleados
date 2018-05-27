<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Yajra\Datatables\Datatables;
use Redirect;
use App\Departamento;
use App\Empresa;
use App\Centro;
use App\Trabajador;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamento = DB::table('departamentos')
                    ->join('centros', 'centros.id', '=', 'departamentos.idCentroDepartamento')
                    ->select('departamentos.id','departamentos.nombreDepartamento','TlfDepartamento','JefeDepartamento','centros.nombreCentro')
                    ->paginate(5);
        return view('departamentos.index',compact('departamento'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamento = Departamento::all();
        $centro = Centro::all();

        return view('departamentos.create',['departamento' => $departamento], ['centro' => $centro]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombreCentro = $request->input('nombreCentro');
        $centro = DB::table('centros')
                    ->where('nombreCentro','=',$nombreCentro)
                    ->select('*')
                    ->first();
        $departamento = new Departamento;
        $departamento->nombreDepartamento = $request->input('nombreDepartamento');
        $departamento->TlfDepartamento = $request->input('TlfDepartamento');
        $departamento->JefeDepartamento = $request->input('JefeDepartamento');
        $departamento->idCentroDepartamento = $centro->id;
        $departamento->save();

        return redirect()->action('DepartamentoController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departamento = DB::table('departamentos')
                    ->where('departamentos.id','=',$id)
                    ->join('centros', 'centros.id', '=', 'departamentos.idCentroDepartamento')
                    ->select('departamentos.id','departamentos.nombreDepartamento','departamentos.TlfDepartamento','departamentos.JefeDepartamento','centros.nombreCentro')
                    ->first();
        $trabajador = DB::table('trabajadores')
                    ->where('trabajadores.idDepartamentoTrabajador', '=',$departamento->id)
                    ->distinct('trabajadores.nombreApellidos','trabajadores.id','trabajadores.idDepartamentoTrabajador')
                    ->first();
        $allDay = TRUE;
        $data = DB::table('ausencias')
                ->select(DB::raw("(SELECT nombreApellidos FROM trabajadores
                WHERE id = $trabajador->id) as title"),'fechaAusencia as start','fechaAusencia as end','tipoAusencia as description')
                ->get();
        $data->toJson();
        return view('departamentos.show',compact('departamento','trabajador','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departamento = DB::table('departamentos')
                    ->where('departamentos.id','=',$id)
                    ->join('centros', 'centros.id', '=', 'departamentos.idCentroDepartamento')
                    ->select('departamentos.id','departamentos.nombreDepartamento','departamentos.TlfDepartamento','departamentos.JefeDepartamento','centros.nombreCentro')
                    ->first();

        return view('departamentos.edit', ['departamento' => $departamento]);
    }

    public function putEdit(Request $request, $id) {
        $departamento = Departamento::findOrFail($id);
        $departamento->nombreDepartamento = $request->input('nombreDepartamento');
        $departamento->TlfDepartamento = $request->input('TlfDepartamento');
        $departamento->JefeDepartamento = $request->input('JefeDepartamento');
        $departamento->save();

        return redirect()->action('DepartamentoController@show',['id'=>$departamento]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departamento = Departamento::find($id);
        $departamento->delete();

        return redirect()->action('DepartamentoController@index');
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
        return redirect()->action('DepartamentoController@index');
    }
}
