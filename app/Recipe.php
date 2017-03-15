<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{

    protected $fillable = [
        'name', 'description', 'status',
    ];

    public function medicine(){
        return $this->belongsToMany('App\Medicines', 'medicines_recipes');
    }

    public function patient(){
        return $this->belongsTo('App\User', 'id_user');
    }

    public function doctor(){
        return $this->belongsTo('App\User', 'id_doctor');
    }
}
