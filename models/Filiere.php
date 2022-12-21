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
}