<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    public function medicalrecords(){
        return $this->belongsTo('App\Record', 'id_recipe');
    }

    public function medicine(){
        return $this->belongsToMany('App\Medicines');
    }
}
