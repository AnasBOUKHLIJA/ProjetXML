<?php

class ProfesseurController
{
    static function get($code){
        return Professeur::get($code);
    }
    static function getAll(){
        return Professeur::getAll();
    }
    static function add($data){
        if(!Personne::verifyUsernameIfExist($data['username'])){
            $code = 0;
            foreach (ProfesseurController::getAll() as $item){
                if($code < (int)substr($item['Code'],1,strlen($item['Code']))){
                    $code = (int)substr($item['Code'],1,strlen($item['Code']));
                }
            }
            $code = $code+1;
            $data['Code'] = 'P'.$code;
            Professeur::add($data);
        }else{
            echo "Deja exist";
        }
    }
}