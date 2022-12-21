<?php

class Personne
{
    static function get($username,$password): array{
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        $Personnes = $CadiAyyad->xpath('//Personnes/Personne[Username="'.$username.'" and Password="'.$password.'"]');
        return array(
            'Username' => (string)$Personnes[0]->Username,
            'Password' => (string)$Personnes[0]->Password,
            'Nom' => (string)$Personnes[0]->Nom,
            'Prenom' => (string)$Personnes[0]->Prenom,
            'Cin' => (string)$Personnes[0]->Cin,
            'EmailEmail' => (string)$Personnes[0]->EmailEmail,
            'Telephone' => (string)$Personnes[0]->Telephone,
            'Photo' => (string)$Personnes[0]->Photo,
            'Sexe' => (string)$Personnes[0]->attributes()->Sexe,
            'Code' => (string)$Personnes[0]->attributes()->Code
        );
    }
}