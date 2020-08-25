<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CycleScolaire extends Model
{
    protected $guarded = [];

    public function admin(){
        return $this->belongsTo('App\Admin');
    }

    public function classe(){
        return $this->hasMany('App\ClasseNiveauCycle');
    }
    
}
