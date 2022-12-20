<?php

class AuthentificationController
{
    static function Authenticate($data){
        if($data['username'] && $data['password']){
            $personne = Personne::get($data['username'],$data['password']);
            if($personne){
                $code = $personne['Code'];
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
                    $permission = Permission::get($code);
                    $data['permission'] = $permission;
                }else {
                    $data['permission'] = 'SuperAdmin';
                }

                $_SESSION = $data;
                header('location: /ProjetXML/accueil');
            }else{}

        }
    }
}