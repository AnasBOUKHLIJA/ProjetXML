<?php

class Module
{
    static function get($mod){
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        return $CadiAyyad->xpath('//Modules/Module[@Code="'.$mod.'"]');
    }
    static function getAll(): array{
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        return $CadiAyyad->xpath('//Modules/Module');
    }
    static function getByFiliere($fil){
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        return $CadiAyyad->xpath('//Modules/Module[@Filiere = "'.$fil.'"]');
    }
    static function getCoordonateur($coordonateur){
        return Personne::get($coordonateur);
    }
    static function add($data){
        $file = 'Database/Database.xml';
        $xml = simplexml_load_file($file);
        $Modules = $xml->Etablissement->Modules;
        $Module = $Modules->addChild('Module');
        $Module->addAttribute('Coordonateur', $data['coordonateur']);
        $Module->addAttribute('Filiere', $data['filiere']);
        $Module->addAttribute('Code', $data['Code']);
        $Module->addChild('Module', $data['module']);
        $dom = new DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml->asXML());
        $dom->save($file);
    }
}

