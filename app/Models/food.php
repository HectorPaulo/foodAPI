<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class food extends Model
{
    protected $fillable = ['name', 'descripcion', 'precio', 'categoria', 'url_img'];
}
