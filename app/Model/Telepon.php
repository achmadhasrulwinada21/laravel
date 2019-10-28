<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Telepon extends Model
{
    protected $table = "telepon";
 
    public function pengguna()
    {
    	return $this->belongsTo('App\Model\Pengguna');
    }
}
