<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $guarded  = [];

    public function niveau_cycle(){
        return $this->hasMany('App\ClasseNiveauCycle');
    }

}
