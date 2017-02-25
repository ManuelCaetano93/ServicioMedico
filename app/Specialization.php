<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    protected $fillable = [
        'name',
    ];

    public function userAppointemnts(){
        return $this->belongsTo('App/User', 'id_user_specialization');
    }
}
