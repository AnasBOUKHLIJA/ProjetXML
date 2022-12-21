<?php

class FiliereController
{
    static function getAll(){
        return Filiere::getAll();
    }
    static function get($fil): string{
        return (string)Filiere::get($fil)[0]->Intitule;
    }
    static function getByDepartement($dept){
        return Filiere::getByDepartement($dept);
    }
    static function getChefFiliere($Chef_filiere){
        $Cfiliere = Filiere::getChefFiliere($Chef_filiere);
        return $Cfiliere['Nom'].' '.$Cfiliere['Prenom'];
    }
    static function getNombreModule($fil){
        return count(Filiere::getNombreModule($fil));
    }
}