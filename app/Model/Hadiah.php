<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Hadiah extends Model
{
      protected $table = "hadiah";
 
    public function anggota()
    {
    	return $this->belongsToMany('App\Model\Anggota');
    }
}
