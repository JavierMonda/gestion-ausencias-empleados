<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    protected $table = 'trabajadores';
    protected $fillable = ['id','DNI', 'foto', 'nombreApellidos', 'FechaIni', 'FechaFin', 'Observaciones', 'tipoContrato', 'vacaciones', 'idDepartamentoTrabajador'];
    
    public function departamento()
    { 
        return $this->belongsTo('App\Departamento');
    }

    public function ausencia()
    { 
        return $this->hasMany('App\Ausencia','idTrabajador');
    }

    public static function search()
    {
        return 'trabajadores.list';
    }
}
