<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Http\Response;

use App\Ausencia;
use App\Trabajador;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allDay = TRUE;
        $data = DB::table('ausencias')
                ->join('trabajadores', 'trabajadores.id', '=', 'ausencias.idTrabajador')
                ->select('trabajadores.nombreApellidos as title','fechaAusencia as start','fechaAusencia as end','tipoAusencia as description')
                ->get();
        //$data = Ausencia::get(['id','tipoAusencia as title','fechaAusencia as start','fechaAusencia as end','idTrabajador as Trabajador']);

        return Response()->json($data);
        //return view('events', compact('data'));
        //return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $allDay = TRUE;
      $data = DB::table('ausencias')
              ->where('ausencias.idTrabajador', '=', $id)
              ->join('trabajadores', 'trabajadores.id', '=', 'ausencias.idTrabajador')
              ->select('trabajadores.nombreApellidos as title','fechaAusencia as start','fechaAusencia as end','tipoAusencia as description')
              ->get();
      //$data = Ausencia::get(['id','tipoAusencia as title','fechaAusencia as start','fechaAusencia as end','idTrabajador as Trabajador']);

      return Response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
