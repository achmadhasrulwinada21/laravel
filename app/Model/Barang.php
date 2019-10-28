<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    // protected $primaryKey = 'kd_barang';
    protected $table = 'tb_barang';
    protected $fillable = ['kd_barang','nm_barang','harga_barang','deskripsi_barang','upload_barang','kd_kategori'];

    
}
