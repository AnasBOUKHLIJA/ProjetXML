<?php

class ElementController
{
    static function getAll(): array{
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        return $CadiAyyad->xpath('//Elements/Element');
    }
    static function getByModule($mod){
        return Element::getByModule($mod);
    }
    static function getEnseignant($enseignant){
        $ens = Element::getEnseignant($enseignant);
        return $ens['Nom'].' '.$ens['Prenom'];
    }
}