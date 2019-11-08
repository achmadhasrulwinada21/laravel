<?php

namespace App\Modules\Sitemap\Models;

use Illuminate\Database\Eloquent\Model;

class Siteheader extends Model
{
     protected $table = 'sitemap_header';
    protected $fillable = ['judul','link'];
}
