<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ausencia extends Model
{
    protected $fillable = ['id','fechaAusencia' ,'tipoAusencia','descripcion','idTrabajador'];
    
    public function trabajador()
    {
        return $this->belongsTo('App\Trabajador');
    }
}
