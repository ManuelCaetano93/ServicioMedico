<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable; use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'identification', 'birthday', 'sex', 'phone', 'cellphone', 'residence', 'email', 'password'
    ];

	public function specializations(){
		return $this->belongsToMany('App\Specialization');
	}

	public function appointments(){
	    return $this->belongsToMany('App\User', 'appointments', 'id_user_patient', 'id_user_doctor')->withTimestamps();
    }

    public function recordsUser(){
	    return $this->hasMany('App\Records', 'user_id', 'id');
    }

    public function recordsDoctor(){
        return $this->hasMany('App\Records', 'doctor_id', 'id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'password', 'remember_token',
    ];
}