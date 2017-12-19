<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Empresa;
use App\Centro;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresa = DB::table('empresas')->paginate(5);

        return view('empresas.index', ['empresa' => $empresa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresas.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empresa = new Empresa;
        $empresa->CIF = $request->input('CIF');
        $empresa->nombreEmpresa = $request->input('nombreEmpresa');
        $empresa->save();
        // Redireccionamos al Index del catálogo
        return redirect()->action('EmpresaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  INT $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa = Empresa::find($id);
        return view('empresas.show', ['empresa' => $empresa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = Empresa::find($id);
        return view('empresas.edit', ['empresa' => $empresa]);
    }

    public function putEdit(Request $request, $id) {
        $empresa = Empresa::findOrFail($id);
        $empresa->CIF = $request->input('CIF');      
        $empresa->nombreEmpresa = $request->input('nombreEmpresa');
        $empresa->save();
        return redirect()->action('EmpresaController@show',['id'=>$empresa]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa = Empresa::find($id);
        $empresa->delete();
        return redirect()->action('EmpresaController@index');
    }

    public function update(Request $request, $id)
    {
        self::destroy($id);
        return redirect()->action('EmpresaController@index');
    }
}
