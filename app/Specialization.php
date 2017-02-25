<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialization extends Model
{
	use SoftDeletes;
	
    protected $fillable = [
        'name',
    ];

    public function userAppointemnts(){
        return $this->belongsTo('App/User', 'id_user_specialization');
    }
}
