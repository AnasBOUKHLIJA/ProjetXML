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
    static function add($data){
        Personne::add($data);
        Permission::add($data['Code'],array('Supperadmin'=> 0,'Addsupperadmin'=> 0,'Removesuperadmin'=> 0,'Editsuperadmin'=> 0,'Addprofesseur'=> 0,'Professeur'=> 1,'Removeprofesseur'=> 0,'Editprofesseur'=> 0,'Agentscolarite'=> 1,'Addagentscolarite'=> 0,'Removeagentscolarite'=> 1,'Editagentscolarite'=> 0,'Adddirecteur'=> 0,'Directeur'=> 0,'Removedirecteur'=> 0,'Editdirecteur'=> 0,'Etudiant'=> 1,'Addetudiant'=> 0,'Removeetudiant'=> 0,'Editetudiant'=> 0,'Abscence'=> 1,'Addabscence'=> 1,'Removeabscence'=> 1,'Editabscence'=> 1,'Departement'=> 1,'Adddepartement'=> 0,'Removedepartement'=> 0,'Editdepartement'=> 0,'Filiere'=> 1,'Addfiliere'=> 0,'Removefiliere'=> 0,'Editfiliere'=> 0,'Element'=> 1,'Addelement'=> 0,'Removeelement'=> 0,'Editelement'=> 0,'Seance'=> 1,'Addseance'=> 1,'Removeseance'=> 0,'Editseance'=> 0));
        $file = 'Database/Database.xml';
        $xml = simplexml_load_file($file);
        $Professeurs = $xml->Etablissement->Professeurs;
        $Professeur = $Professeurs->addChild('Professeur');
        $Professeur->addAttribute('Code', $data['Code']);
        $Professeur->addChild('NumeroSomme', $data['numerosomme']);
        $Professeur->addChild('Departement', $data['departement']);
        $dom = new DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml->asXML());
        $dom->save($file);
    }
}