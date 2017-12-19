<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TrabajadorTlf;

class TrabajadortlfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trabajadortlf = TrabajadorTlf::all();
        return view('trabajadortlfs.index', ['trabajadortlf' => $trabajadortlf]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trabajadortlfs.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trabajadortlf = new TrabajadorTlf;
        $trabajadortlf->idTrabajadorTlf = $request->input('idTrabajadorTlf');
        $trabajadortlf->TlfTrabajador = $request->input('TlfTrabajador');
        $trabajadortlf->save();
        // Redireccionamos al Index del catálogo
        return redirect()->action('TrabajadortlfController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  INT $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trabajadortlf = TrabajadorTlf::find($id);
        return view('trabajadortlfs.show', ['trabajadortlf' => $trabajadortlf]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trabajadortlf = TrabajadorTlf::find($id);
        return view('trabajadortlfs.edit', ['trabajadortlf' => $trabajadortlf]);
    }

    public function putEdit(Request $request, $id) {
        $trabajadortlf = TrabajadorTlf::findOrFail($id);
        $trabajadortlf->idTrabajadorTlf = $request->input('idTrabajadorTlf');      
        $trabajadortlf->TlfTrabajador = $request->input('TlfTrabajador');
        $trabajadortlf->save();
        return redirect()->action('TrabajadortlfController@show',['id'=>$trabajadortlf]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trabajadortlf = TrabajadorTlf::find($id);
        $trabajadortlf->delete();
        return redirect()->action('TrabajadorlfController@index');
    }

    public function update(Request $request, $id)
    {
        self::destroy($id);
        return redirect()->action('TrabajadortlfController@index');
    }
}
