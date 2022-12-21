<?php

class Filiere
{
    static function getAll(): array{
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        return $CadiAyyad->xpath('//Filieres/Filiere');
    }
    static function getByDepartement($dept){
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        return $CadiAyyad->xpath('//Filieres/Filiere[@Departement = "'.$dept.'"]');
    }
    static function getChefFiliere($Chef_filiere){
        return Personne::get($Chef_filiere);
    }
    static function getNombreModule($fil){
        return Module::getByFiliere($fil);
    }
}