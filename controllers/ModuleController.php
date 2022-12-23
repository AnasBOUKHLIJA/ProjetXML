<?php

class ModuleController
{
    static function get($mod){
        return Module::get($mod)[0];
    }
    static function getByFiliere($fil){
        return Module::getByFiliere($fil);
    }
    static function getCoordonateur($coordonateur){
        $cor = Module::getCoordonateur($coordonateur);
        return $cor['Nom'].' '.$cor['Prenom'];
    }
    static function add($data){
        $code = 0;
        $codeFil = strlen($data['filiere']);
        foreach (ModuleController::getByFiliere($data['filiere']) as $item){
            if(strpos($item->attributes()->Code,$data['filiere'])  !== false){
                if($code < (int)substr($item->attributes()->Code ,3+$codeFil,strlen($item->attributes()->Code))){
                    $code = (int)substr($item->attributes()->Code,3+$codeFil,strlen($item->attributes()->Code));
                }
            }
        }
        $code = $code+1;
        $data['Code'] = $data['filiere'].'MOD'.$code;
        Module::add($data);
    }
}