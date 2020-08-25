<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClasseNiveauCycle extends Model
{
    protected $guarded = [];

    public function niveau(){
        return $this->belongsTo('App\NiveauScolaire');
    }

    public function cycle(){
        return $this->belongsTo('App\CycleScolaire');
    }

    public function classe(){
        return $this->belongsTo('App\Classe');
    }

    public function etudiant(){
        return $this->hasMany('App\FicheEtudiant');
    }

    public function matiere_prof(){
        return $this->hasMany('App\MatiereProfClasse');
    }


}
