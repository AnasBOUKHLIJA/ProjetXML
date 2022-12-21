<?php

class FiliereController
{
    static function getAll(){
        return Filiere::getAll();
    }
    static function getChefFiliere($Chef_filiere){
        $Cfiliere = Filiere::getChefFiliere($Chef_filiere);
        return $Cfiliere['Nom'].' '.$Cfiliere['Prenom'];
    }
    static function getNombreModule($fil){
        return count(Filiere::getNombreModule($fil));
    }
}