<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = "pengguna";
 
    public function telepon()
    {
    	return $this->hasOne('App\Model\Telepon');
    }
}
