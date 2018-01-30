<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ausencia extends Model
{
    protected $fillable = ['id','fechaAusencia' ,'tipoAusencia','descripcion','idTrabajador','idParte'];

    public function trabajador()
    {
        return $this->belongsTo('App\Trabajador');
    }
    public function parte()
    {
        return $this->belongsTo('App\Parte');
    }
}
