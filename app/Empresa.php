<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
	protected $fillable = ['id','CIF', 'nombreEmpresa'];
    public function centros()
    {
        return $this->hasMany('App\Centro','idEmpresa');
    }
}
