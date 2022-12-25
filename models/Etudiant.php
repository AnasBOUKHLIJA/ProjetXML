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
    static function getByFiliere($fil){
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        $Etudiants = $CadiAyyad->xpath('//Etudiants/Etudiant[Filiere="'.$fil.'"]');
        $EtudiantsArray = array();
        for($i = 0 ; $i < count($Etudiants) ; $i++){
            $EtudiantsArray[$i] = Personne::get($Etudiants[$i]->attributes()->Code);
            $EtudiantsArray[$i]['Cne'] = $Etudiants[$i]->Cne;
            $EtudiantsArray[$i]['Filiere'] = $Etudiants[$i]->Filiere;
        }
        return $EtudiantsArray;
    }
    static function add($data){
        Personne::add($data);
        Permission::add($data['Code'],array('Supperadmin'=> 0,'Addsupperadmin'=> 0,'Removesuperadmin'=> 0,'Editsuperadmin'=> 0,'Addprofesseur'=> 0,'Professeur'=> 0,'Removeprofesseur'=> 0,'Editprofesseur'=> 0,'Agentscolarite'=> 0,'Addagentscolarite'=> 0,'Removeagentscolarite'=> 0,'Editagentscolarite'=> 0,'Adddirecteur'=> 0,'Directeur'=> 0,'Removedirecteur'=> 0,'Editdirecteur'=> 0,'Etudiant'=> 1,'Addetudiant'=> 0,'Removeetudiant'=> 0,'Editetudiant'=> 0,'Abscence'=> 0,'Addabscence'=> 0,'Removeabscence'=> 0,'Editabscence'=> 0,'Departement'=> 0,'Adddepartement'=> 0,'Removedepartement'=> 0,'Editdepartement'=> 0,'Filiere'=> 0,'Addfiliere'=> 0,'Removefiliere'=> 0,'Editfiliere'=> 0,'Module'=> 0,'Addmodule'=> 0,'Removemodule'=> 0,'Editmodule'=> 0,'Element'=> 0,'Addelement'=> 0,'Removeelement'=> 0,'Editelement'=> 0,'Seance'=> 0,'Addseance'=> 0,'Removeseance'=> 0,'Editseance'=> 0));
        $file = 'Database/Database.xml';
        $xml = simplexml_load_file($file);
        $Etudiants = $xml->Etablissement->Etudiants;
        $Etudiant = $Etudiants->addChild('Etudiant');
        $Etudiant->addAttribute('Code', $data['Code']);
        $Etudiant->addChild('Cne', $data['cne']);
        $Etudiant->addChild('Filiere', $data['filiere']);
        $dom = new DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml->asXML());
        $dom->save($file);
    }
}