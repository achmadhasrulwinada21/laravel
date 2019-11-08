<?php

namespace App\Modules\Banner\Models;

use Illuminate\Database\Eloquent\Model;

class Mbanner extends Model
{
    protected $table = 'banner';
    protected $fillable = ['nama','upload','ket'];
}
