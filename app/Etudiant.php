<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    protected $guarded = [];

    public function fiche_etudiant(){
        return $this->hasMany('App\FicheEtudiant');
    }

}
