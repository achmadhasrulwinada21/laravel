<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;
    protected $table ='blog_post';
    protected $fillable = [

        'title', 'description','nim'

    ];
protected $dates = ['deleted_at'];
    
}
