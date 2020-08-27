<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClasseNiveauCycle extends Model
{
    protected $guarded = [];

    public function niveau(){
        return $this->belongsTo('App\NiveauScolaire','niveau_scolaire_id');
    }

    public function cycle(){
        return $this->belongsTo('App\CycleScolaire','cycle_scolaire_id');
    }

    public function classe(){
        return $this->belongsTo('App\Classe','classe_id');
    }

    public function etudiant(){
        return $this->hasMany('App\FicheEtudiant');
    }

    public function matiere_prof(){
        return $this->hasMany('App\MatiereProfClasse');
    }


}
