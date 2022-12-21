<?php

class Professeur
{
    static function get($code){
        return Personne::get($code);
    }
    static function getByDepartement($dept){
            $CadiAyyad = simplexml_load_file('Database/Database.xml');
            return $CadiAyyad->xpath('//Professeurs/Professeur[Departement = "'.$dept.'"]');
    }
}