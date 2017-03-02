<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Records extends Model
{
    protected $fillable = [
        'name', 'description', 'suffering', 'doctor', 'pretreatments', 'medicines', 'status'
    ];

    public function userRecords(){
        return $this->belongsTo('App/User', 'id_user_records');
    }
}