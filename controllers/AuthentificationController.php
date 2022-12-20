<?php

class AuthentificationController
{
    static function Authenticate($data){
        if($data['username'] && $data['password']){
            $personne = Personne::get($data['username'],$data['password']);
            if($personne){
                $personne = $personne[0];
                $code = $personne->attributes()->Code;
                $personneCategorieArray = array(
                    'A'=>'SuperAdmin',
                    'D'=>'Directeur',
                    'S'=>'AgentScolarite',
                    'P'=>'Professeur',
                    'E'=>'Etudiant',
                );
                $personneCategorie = substr($code,0,1);
                $data = array('data'=>$personne);
                $data['personneCategorie'] =  $personneCategorieArray[$personneCategorie];
                if(strtolower($personneCategorie) != strtolower('A')){
                    $permission = Permission::get($personne->attributes()->Code);
                    $data['permission'] = $permission;
                }else {
                    $data['permission'] = 'SuperAdmin';
                }
                print_r($data);
            }else{}

        }
    }
}