<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentTypes extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre_doc', 'decripcion_doc','estado_doc',
    ];
}
