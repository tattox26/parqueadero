<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Quotas extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'fecha_entrada_cup'
    ];

    public function parkingDetail() {
		return $this->hasOne(ParkingDetails::class,'parking_id');
	}

    public function client() {
		return $this->hasOne(Client::class,'client_id');
	}

    public function employee() {
		return $this->hasOne(Client::class,'employee_id');
	}
}
