<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ParkingDetails extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'piso_det', 'espacio_det','estado_det',
    ];

    public function rates() {
		return $this->belongsTo(Rates::class,'rate_id');
	}
}
