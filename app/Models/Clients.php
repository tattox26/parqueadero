<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $primaryKey = 'id';
    
    public function user() {
		return $this->hasOne(Users::class,'user_id');
	}

    public function paymentType() {  
		return $this->hasOne(paymentType::class,'payment_type_id ');
	}
}
