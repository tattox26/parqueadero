<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Rates extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'precio_tar'
    ];

}
