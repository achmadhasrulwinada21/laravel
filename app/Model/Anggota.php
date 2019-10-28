<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = "anggota";
 
    public function hadiah()
    {
    	return $this->belongsToMany('App\Model\Hadiah');
    }
}
