<?php

class DepartementController
{
    static function getAll(){
        return Departement::getAll();
    }
    static function get($dept): string{
        return (string)Departement::get($dept)[0]->Departement;
    }
    static function getChefDepartement($Chef_departement){
        $departement =  Departement::getChefDepartement($Chef_departement);
        return $departement['Nom'].' '.$departement['Prenom'];
    }
    static function getNombreFiliere($dept){
        return count(Departement::getNombreFiliere($dept));
    }
    static function getNombreProfesseur($dept){
        return count(Departement::getNombreProfesseur($dept));
    }
}