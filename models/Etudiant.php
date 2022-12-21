<?php

class Etudiant
{
    static function get($code){
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        $Etudiant = $CadiAyyad->xpath('//Etudiants/Etudiant[@Code="'.$code.'"]');
        $EtudiantArray = array();
        $EtudiantArray[0] = Personne::get($Etudiant[0]->attributes()->Code);
        $EtudiantArray[0]['Cne'] = $Etudiant[0]->Cne;
        $EtudiantArray[0]['Filiere'] = $Etudiant[0]->Filiere;
        return $EtudiantArray[0];
    }
    static function getAll(){
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        $Etudiants = $CadiAyyad->xpath('//Etudiants/Etudiant');
        $EtudiantsArray = array();
        for($i = 0 ; $i < count($Etudiants) ; $i++){
            $EtudiantsArray[$i] = Personne::get($Etudiants[$i]->attributes()->Code);
            $EtudiantsArray[$i]['Cne'] = $Etudiants[$i]->Cne;
            $EtudiantsArray[$i]['Filiere'] = $Etudiants[$i]->Filiere;
        }
        return $EtudiantsArray;
    }
}