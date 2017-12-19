<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $fillable = ['id','nombreDepartamento', 'TlfDepartamento', 'JefeDepartamento', 'idCentroDepartamento'];

    public function trabajador()
    {
        return $this->hasMany('App\Trabajador','idDepartamentoTrabajador');
    }

    public function centro()
    { 
        return $this->belongsTo('App\Centro');
    }
}
