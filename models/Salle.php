<?php

class Salle
{
    static function get($code){
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        return $CadiAyyad->xpath('//Salles/Salle[@Code="'.$code.'"]');
    }
    static function getAll(): array{
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        return $CadiAyyad->xpath('//Salles/Salle');
    }

}

