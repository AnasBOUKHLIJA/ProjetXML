<?php

class ElementController
{
    static function getAll(): array{
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        return $CadiAyyad->xpath('//Elements/Element');
    }
    static function get($code){
        return Element::get($code);
    }
    static function getByModule($mod){
        return Element::getByModule($mod);
    }
    static function getEnseignant($enseignant){
        $ens = Element::getEnseignant($enseignant);
        return $ens['Nom'].' '.$ens['Prenom'];
    }
    static function add($data){
        $code = 0;
        $codeFil = strlen($data['module']);
        foreach (ElementController::getByModule($data['module']) as $item){
            if(strpos($item->attributes()->Code,$data['module'])  !== false){
                if($code < (int)substr($item->attributes()->Code ,3+$codeFil,strlen($item->attributes()->Code))){
                    $code = (int)substr($item->attributes()->Code,3+$codeFil,strlen($item->attributes()->Code));
                }
            }
        }
        $code = $code+1;
        $data['Code'] = $data['module'].'ELE'.$code;
        Element::add($data);
    }
}