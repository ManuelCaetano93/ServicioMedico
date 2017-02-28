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

    public function users(){
        return $this->belongsToMany('App\User');
    }
	
	protected $dates = ['deleted_at'];
}
