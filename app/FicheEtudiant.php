<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FicheEtudiant extends Model
{
    protected $guarded = [];

    public function etudiant(){
        return $this->belongsTo('App\Etudiant');
    }
}
