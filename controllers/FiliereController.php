<?php

class FiliereController
{
    static function getAll(){
        return Filiere::getAll();
    }
    static function get($fil): string{
        return (string)Filiere::get($fil)[0]->Intitule;
    }
    static function getByDepartement($dept){
        return Filiere::getByDepartement($dept);
    }
    static function getChefFiliere($Chef_filiere){
        $Cfiliere = Filiere::getChefFiliere($Chef_filiere);
        return $Cfiliere['Nom'].' '.$Cfiliere['Prenom'];
    }
    static function getNombreModule($fil){
        return count(Filiere::getNombreModule($fil));
    }
    static function add($data){
        $code = 0;
        $codeDept = strlen($data['departement']);
        foreach (FiliereController::getAll() as $item){
            if(strpos($item->attributes()->Code,$data['departement'])  !== false){
                if($code < (int)substr($item->attributes()->Code ,3+$codeDept,strlen($item->attributes()->Code))){
                    $code = (int)substr($item['Code'],3+$codeDept,strlen($item->attributes()->Code));
                }
            }
        }
        $code = $code+1;
        $data['Code'] = $data['departement'].'Fil'.$code;
        Filiere::add($data);
    }
}