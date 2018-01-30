<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parte extends Model
{
  protected $table = 'partes';
  protected $fillable = ['id','inicio','fin'];

  public function ausencia()
  {
      return $this->hasMany('App\Ausencia','idParte');
  }
}
