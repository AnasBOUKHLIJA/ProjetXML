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
                setcookie("langue", "Francais", time() + (86400 * 30), "/");// 86400 = 1 day
                header('location: /ProjetXML/accueil');
            }else{}
        }
    }
    static function changeLangue($lang,$href){
        setcookie('langue', '', time() - 3600, '/');
        setcookie("langue", $lang, time() + (86400 * 30), "/");
        header('location: '.$href);
    }
}