<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class PaymentTypes extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre_pago', 'descripcion_pago'
    ];

   
}
