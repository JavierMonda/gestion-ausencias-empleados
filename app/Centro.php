<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
	protected $fillable = ['id','nombreCentro', 'idEmpresa'];
	
	public function departamento()
    {
        return $this->hasMany('App\Departamento','idCentroDepartamento');
    }

    public function empresa()
    { 
        return $this->belongsTo('App\Empresa');
    }

}
