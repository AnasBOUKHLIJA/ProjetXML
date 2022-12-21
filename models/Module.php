<?php

class Module
{
    static function getAll(): array{
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        return $CadiAyyad->xpath('//Modules/Module');
    }
    static function getByFiliere($fil){
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        return $CadiAyyad->xpath('//Modules/Module[@Filiere = "'.$fil.'"]');
    }
}