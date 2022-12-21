<?php

class Module
{
    static function get($mod){
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        return $CadiAyyad->xpath('//Modules/Module[@Code="'.$mod.'"]');
    }
    static function getAll(): array{
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        return $CadiAyyad->xpath('//Modules/Module');
    }
    static function getByFiliere($fil){
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        return $CadiAyyad->xpath('//Modules/Module[@Filiere = "'.$fil.'"]');
    }
    static function getCoordonateur($coordonateur){
        return Personne::get($coordonateur);
    }
}

