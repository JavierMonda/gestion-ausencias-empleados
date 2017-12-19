<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Extension;

class ExtensionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $extension = Extension::all();
        return view('extensiones.index', ['extension' => $extension]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('extensiones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $extension = new Extension;
        $extension->numero = $request->input('numero');
        $extension->numPuerto = $request->input('numPuerto');
        $extension->idDepartamento = $request->input('idDepartamento');
        $extension->save();
        // Redireccionamos al Index del catálogo
        return redirect()->action('ExtensionController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $extension = Extension::find($id);
        return view('extensiones.show', ['extension' => $extension]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $extension = Extension::find($id);
        return view('extensiones.edit', ['extension' => $extension]);
    }

    public function putEdit(Request $request, $id) {
        $extension = Extension::findOrFail($id);
        $extension->numero = $request->input('numero');
        $extension->numPuerto = $request->input('numPuerto');
        $extension->idDepartamento = $request->input('idDepartamento');
        $extension->save();
        return redirect()->action('ExtensionController@show',['id'=>$extension]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $extension = Extension::find($id);
        $extension->delete();
        return redirect()->action('ExtensionController@index');
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
        return redirect()->action('ExtensionController@index');
    }   
}
