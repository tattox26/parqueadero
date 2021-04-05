<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'fecha_salida_fac'
    ];
}
