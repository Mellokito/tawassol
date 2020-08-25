<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    public function admin(){
        return $this->hasMany('App\Admin');
    }
}
