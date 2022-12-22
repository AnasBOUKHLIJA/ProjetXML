<?php

class Departement
{
    static function getAll(): array{
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        return $CadiAyyad->xpath('//Departements/Departement');
    }
    static function get($dept){
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        return $CadiAyyad->xpath('//Departements/Departement[@Code="'.$dept.'"]');
    }
    static function getChefDepartement($Chef_departement){
       return Personne::get($Chef_departement);
    }
    static function getNombreFiliere($dept){
        return Filiere::getByDepartement($dept);
    }
    static function getNombreProfesseur($dept){
        return Professeur::getByDepartement($dept);
    }
    static function add($data){
        $file = 'Database/Database.xml';
        $xml = simplexml_load_file($file);
        $Departements = $xml->Etablissement->Departements;
        $Departement = $Departements->addChild('Departement');
        $Departement->addAttribute('Chef_departement', $data['chef_departement']);
        $Departement->addAttribute('Code', $data['Code']);
        $Departement->addChild('Departement', $data['departement']);
        $dom = new DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml->asXML());
        $dom->save($file);
    }
}