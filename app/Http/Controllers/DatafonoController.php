<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Datafono;

class DatafonoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datafono = Datafono::all();
        return view('datafonos.index', ['datafono' => $datafono]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('datafonos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datafono = new Datafono;
        $datafono->numTPV = $request->input('numTPV');
        $datafono->numComercio = $request->input('numComercio');
        $datafono->banco = $request->input('banco');
        $datafono->conexion = $request->input('conexion');
        $datafono->idCentroDatafonos = $request->input('idCentroDatafonos');
        $datafono->save();
        // Redireccionamos al Index del catálogo
        return redirect()->action('DatafonoController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datafono = Datafono::find($id);
        return view('datafonos.show', ['datafono' => $datafono]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datafono = Datafono::find($id);
        return view('datafonos.edit', ['datafono' => $datafono]);
    }

    public function putEdit(Request $request, $id) {
        $datafono = Datafono::findOrFail($id);
        $datafono->numTPV = $request->input('numTPV');      
        $datafono->numComercio = $request->input('numComercio');
        $datafono->banco = $request->input('banco');
        $datafono->conexion = $request->input('conexion');
        $datafono->idCentroDatafonos = $request->input('idCentroDatafonos');
        $datafono->save();
        return redirect()->action('DatafonoController@show',['id'=>$datafono]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datafono = Datafono::find($id);
        $datafono->delete();
        return redirect()->action('DatafonoController@index');
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
        return redirect()->action('DatafonoController@index');
    }   
}
