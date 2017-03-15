<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicines extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'component', 'presentation'
    ];
    public function recipe(){
        return $this->belongsToMany('App/Recipe');
    }

    protected $dates = ['deleted_at'];
}
