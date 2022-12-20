<?php

class Personne
{
    static function get($username,$password){
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        $Personnes = $CadiAyyad->xpath('//Personnes/Personne[Username="'.$username.'" and Password="'.$password.'"]');
        return $Personnes;
    }
}