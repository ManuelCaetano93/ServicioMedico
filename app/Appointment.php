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

    public function userAppointemnts(){
        return $this->belongsTo('App/User', 'id_user_appointment');
    }
	protected $dates = ['deleted_at'];
}
