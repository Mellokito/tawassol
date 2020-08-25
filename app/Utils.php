<?php

namespace App;

class Utils
{
    public function identifiantUser($nom,$prenom,$clas_name){
    /*****************************************/
        //creation compte prof
        // vérifier le username s'il existe déja
        $nom_user = strtolower($nom);
        $prenom_user = strtolower($prenom);

        $tab = array(" ", "\t", "\n", "\r", "\0", "\x0B", "\xA0", "'");
        $nom_user = str_replace($tab, array(), $nom_user);
        $prenom_user = str_replace($tab, array(), $prenom_user);

        $identifiant_connexion_user = $prenom_user . '.' . $nom_user;
        if (!$clas_name->where('username',$identifiant_connexion_user)->first()) {
            $identifiant_connexion_user =$identifiant_connexion_user;
        } else {
            for ($i = 1;; $i++) {
                if (!$clas_name->where('username',$identifiant_connexion_user . '.' . $i)->first()) {
                    $identifiant_connexion_user = $identifiant_connexion_user . '.' . $i;
                    break;
                }
            }
        }

        return $identifiant_connexion_user;
    }
    
}
