<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $table = "articles";

    public function tags(){
    	return $this->hasMany('App\Model\Tag');
    }
}
