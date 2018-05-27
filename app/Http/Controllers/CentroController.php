<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Centro;
use App\Empresa;

class CentroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centro = DB::table('centros')
                    ->join('empresas', 'empresas.id', '=', 'centros.idEmpresa')
                    ->select('centros.id','centros.nombreCentro','empresas.nombreEmpresa')
                    ->paginate(5);
        return view('centros.index',compact('centro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centro = Centro::all();
        $empresa = Empresa::all();
        return view('centros.create',['centro' => $centro], ['empresa' =>$empresa]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombreEmpresa = $request->input('nombreEmpresa');
        $empresa = DB::table('empresas')
                    ->where('nombreEmpresa','=',$nombreEmpresa)
                    ->select('*')
                    ->first();
        $centro = new Centro;
        $centro->nombreCentro = $request->input('nombreCentro');
        $centro->idEmpresa = $empresa->id;
        $centro->save();
        // Redireccionamos al Index del catálogo
        return redirect()->action('CentroController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $centro = DB::table('centros')
                    ->where('centros.id','=',$id)
                    ->join('empresas', 'empresas.id', '=', 'centros.idEmpresa')
                    ->select('centros.id','centros.nombreCentro','empresas.nombreEmpresa')
                    ->first();

        return view('centros.show',compact('centro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $centro = DB::table('centros')
                    ->where('centros.id','=',$id)
                    ->join('empresas', 'empresas.id', '=', 'centros.idEmpresa')
                    ->select('centros.id','centros.nombreCentro','empresas.nombreEmpresa')
                    ->first();
        return view('centros.edit', ['centro' => $centro]);
    }

    public function putEdit(Request $request, $id) {
        $centro = Centro::findOrFail($id);
        $centro->nombreCentro = $request->input('nombreCentro');
        $centro->save();
        return redirect()->action('CentroController@show',['id'=>$centro]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $centro = Centro::find($id);
        $centro->delete();
        return redirect()->action('CentroController@index');
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
        return redirect()->action('CentroController@index');
    }
}
