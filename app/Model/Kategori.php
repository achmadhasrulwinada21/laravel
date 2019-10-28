<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategoribarang';
    protected $fillable = ['kd_kategori','nm_kategori'];

   
}
