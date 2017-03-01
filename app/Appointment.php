<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
	use SoftDeletes;
    protected $fillable = [
        'date', 'status',
    ];

    public function doctor(){
        return $this->belongsTo('App/User', 'id_user_doctor');
    }
    public function patient(){
        return $this->belongsTo('App/User', 'id_user_patient');
    }
	protected $dates = ['deleted_at'];
}
