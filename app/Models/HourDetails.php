<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class HourDetails extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'fecha_apertura_hor', 'fecha_cierre_hor','dia_hor','estado_hor'
    ];

    
}
