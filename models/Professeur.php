<?php

class Professeur
{
    static function get($code){
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        $Professeur = $CadiAyyad->xpath('//Professeurs/Professeur[@Code="'.$code.'"]');
        $ProfesseurArray = array();
        $ProfesseurArray[0] = Personne::get($Professeur[0]->attributes()->Code);
        $ProfesseurArray[0]['NumeroSomme'] = $Professeur[0]->NumeroSomme;
        $ProfesseurArray[0]['Departement'] = $Professeur[0]->Departement;
        return $ProfesseurArray[0];
    }

    static function getAll(){
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        $Professeurs = $CadiAyyad->xpath('//Professeurs/Professeur');
        $ProfesseursArray = array();
        for($i = 0 ; $i < count($Professeurs) ; $i++){
            $ProfesseursArray[$i] = Personne::get($Professeurs[$i]->attributes()->Code);
            $ProfesseursArray[$i]['NumeroSomme'] = $Professeurs[$i]->NumeroSomme;
            $ProfesseursArray[$i]['Departement'] = $Professeurs[$i]->Departement;
        }
        return $ProfesseursArray;
    }

    static function getByDepartement($dept){
            $CadiAyyad = simplexml_load_file('Database/Database.xml');
            return $CadiAyyad->xpath('//Professeurs/Professeur[Departement = "'.$dept.'"]');
    }
}