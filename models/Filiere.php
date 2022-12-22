<?php

class Filiere
{
    static function getAll(): array{
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        return $CadiAyyad->xpath('//Filieres/Filiere');
    }
    static function getByDepartement($dept){
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        return $CadiAyyad->xpath('//Filieres/Filiere[@Departement = "'.$dept.'"]');
    }
    static function getChefFiliere($Chef_filiere): array{
        return Personne::get($Chef_filiere);
    }
    static function getNombreModule($fil){
        return Module::getByFiliere($fil);
    }
    static function get($fil){
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        return $CadiAyyad->xpath('//Filieres/Filiere[@Code="'.$fil.'"]');
    }
    static function add($data){
        $file = 'Database/Database.xml';
        $xml = simplexml_load_file($file);
        $Filieres = $xml->Etablissement->Filieres;
        $Filiere = $Filieres->addChild('Filiere');
        $Filiere->addAttribute('Chef_filiere', $data['chef_filiere']);
        $Filiere->addAttribute('Departement', $data['departement']);
        $Filiere->addAttribute('Code', $data['Code']);
        $Filiere->addChild('Intitule', $data['intitule']);
        $dom = new DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml->asXML());
        $dom->save($file);
    }
}