<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategorieNiveauScolaire extends Model
{
    protected $guarded =[];

    
    public function niveau(){
        return $this->hasMany('App\NiveauScolaire');
    }
}
