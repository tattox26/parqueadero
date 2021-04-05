<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Targets extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'puntos_tar','estado_tar'
    ];
}
