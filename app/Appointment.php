<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
	use SoftDeletes;

    public function patient(){
        return $this->belongsTo('App\User', 'id_user_patient');
    }
    public function doctor(){
    return $this->belongsTo('App\User', 'id_user_doctor');
    }

    protected $fillable = [
        'date', 'status',
    ];

	protected $dates = ['deleted_at'];
}
