<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NiveauScolaire extends Model
{
    protected $guarded = [];

    public function admin(){
        return $this->belongsTo('App\Admin');
    }

    public function categorie(){
        return $this->belongsTo('App\CategorieNiveauScolaire','categorie_niveau');
    }

    public function classe(){
        return $this->hasMany('App\ClasseNiveauCycle');
    }
}
