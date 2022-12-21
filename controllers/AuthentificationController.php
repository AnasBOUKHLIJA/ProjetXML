<?php

class AuthentificationController
{
    static function Authenticate($data){
        if($data['username'] && $data['password']){
            $personne = Personne::Authenticate($data['username'],$data['password']);
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
                $data = array('code'=>$code);
                $data['personneCategorie'] =  $personneCategorieArray[$personneCategorie];
                $_SESSION = $data;
                header('location: /ProjetXML/accueil');
            }else{}
        }
    }
}