<?php

class EtudiantController
{
    static function get($code){
        return Etudiant::get($code);
    }
    static function getAll(){
        return Etudiant::getAll();
    }
    static function add($data){
        if(!Personne::verifyUsernameIfExist($data['username'])){
            $code = 0;
            foreach (EtudiantController::getAll() as $item){
                if($code < (int)substr($item['Code'],1,strlen($item['Code']))){
                    $code = (int)substr($item['Code'],1,strlen($item['Code']));
                }
            }
            $code = $code+1;
            $data['Code'] = 'E'.$code;
            Etudiant::add($data);
        }else{
            echo "Deja exist";
        }
    }
}