<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicines extends Model
{
    protected $fillable = [
        'name', 'component', 'presentation'
    ];
    public function recipe(){
        return $this->belongsToMany('App/Recipe');
    }
}
