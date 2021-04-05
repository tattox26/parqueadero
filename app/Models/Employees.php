<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'hojadevida_emp', 'eps_emp','cajacompensacion_emp','cargo_emp'
    ];

    public function user() {
		return $this->hasOne(Users::class,'user_id');
	}
}
