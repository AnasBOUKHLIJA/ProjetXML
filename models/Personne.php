<?php

class Personne
{
    static function get($code): array{
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        $Personnes = $CadiAyyad->xpath('//Personnes/Personne[@Code="'.$code.'"]');
        return array(
            'Username' => (string)$Personnes[0]->Username,
            'Password' => (string)$Personnes[0]->Password,
            'Nom' => (string)$Personnes[0]->Nom,
            'Prenom' => (string)$Personnes[0]->Prenom,
            'Cin' => (string)$Personnes[0]->Cin,
            'Email' => (string)$Personnes[0]->Email,
            'Telephone' => (string)$Personnes[0]->Telephone,
            'Photo' => (string)$Personnes[0]->Photo,
            'Sexe' => (string)$Personnes[0]->attributes()->Sexe,
            'Code' => (string)$Personnes[0]->attributes()->Code
        );
    }

    static function Authenticate($username,$password){
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        $Personnes = $CadiAyyad->xpath('//Personnes/Personne[Username="'.$username.'" and Password="'.$password.'"]');
        if($Personnes){
            return Personne::get($Personnes[0]->attributes()->Code);
        } else{
            header('location: /ProjetXML/connexion?error');
        }
    }
}