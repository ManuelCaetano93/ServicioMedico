<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'date', 'status_delete', 'status',
    ];

    public function userAppointemnts(){
        return $this->belongsTo('App/User', 'id_user_appointment');
    }



}
