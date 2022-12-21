<?php

class Element
{
    static function getAll(): array{
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        return $CadiAyyad->xpath('//Elements/Element');
    }
    static function getByModule($mod){
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        return $CadiAyyad->xpath('//Elements/Element[@Module = "'.$mod.'"]');
    }
    static function getEnseignant($enseignant){
        return Personne::get($enseignant);
    }
}