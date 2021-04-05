<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Parkings extends Model
{
  protected $primaryKey = 'id';
  protected $fillable = [
      'nombre_par', 'direccion_par','capacidad_par','ruta_par'
  ];

  public function parkingDetail() {
		return $this->hasOne(ParkingDetails::class,'parking_id');
	}
  public function hourDetail() {
		return $this->belongsTo(HourDetails::class,'parking_id');
	}
}
