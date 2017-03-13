<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Records extends Model
{
    protected $fillable = [
        'name', 'description', 'suffering', 'doctor', 'pretreatments', 'medicines', 'status'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'id_user', 'id');
    }

    public function doctor(){
        return $this->belongsTo('App\User', 'id_doctor', 'id');
    }
}