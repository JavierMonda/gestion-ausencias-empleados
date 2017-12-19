<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trabajo;

class TrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trabajo = Trabajo::all();
        return view('trabajos.index', ['trabajo' => $trabajo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trabajos.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trabajo = new Trabajo;
        $trabajo->descripcionTrabajos = $request->input('descripcionTrabajos');
        $trabajo->save();
        // Redireccionamos al Index del catálogo
        return redirect()->action('TrabajoController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  INT $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trabajo = Trabajo::find($id);
        return view('trabajos.show', ['trabajo' => $trabajo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trabajo = Trabajo::find($id);
        return view('trabajos.edit', ['trabajo' => $trabajo]);
    }

    public function putEdit(Request $request, $id) {
        $trabajo = Trabajo::findOrFail($id);
        $trabajo->descripcionTrabajos = $request->input('descripcionTrabajos');
        $trabajo->save();
        return redirect()->action('TrabajoController@show',['id'=>$trabajo]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trabajo = Trabajo::find($id);
        $trabajo->delete();
        return redirect()->action('TrabajoController@index');
    }

    public function update(Request $request, $id)
    {
        self::destroy($id);
        return redirect()->action('TrabajoController@index');
    }
}
