<?php

class Departement
{
    static function getAll(): array{
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        return $CadiAyyad->xpath('//Departements/Departement');
    }
    static function get($dept){
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        return $CadiAyyad->xpath('//Departements/Departement[@Code="'.$dept.'"]');
    }
    static function getChefDepartement($Chef_departement){
       return Personne::get($Chef_departement);
    }
    static function getNombreFiliere($dept){
        return Filiere::getByDepartement($dept);
    }
    static function getNombreProfesseur($dept){
        return Professeur::getByDepartement($dept);
    }
}