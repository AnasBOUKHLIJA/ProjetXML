<?php

class AgentScolarite
{
    static function get($code){
        return Personne::get($code);
    }
    static function getAll(){
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        $AgentScolarites = $CadiAyyad->xpath('//AgentScolarites/AgentScolarite');
        $AgentScolaritesArray = array();
        for($i = 0 ; $i < count($AgentScolarites) ; $i++){
            $AgentScolaritesArray[$i] = Personne::get($AgentScolarites[$i]->attributes()->Code);
        }
        return $AgentScolaritesArray;
    }
    static function add($data){
        Personne::add($data);
        $file = 'Database/Database.xml';
        $xml = simplexml_load_file($file);
        $AgentScolarites = $xml->Etablissement->AgentScolarites;
        $AgentScolarite = $AgentScolarites->addChild('AgentScolarite');
        $AgentScolarite->addAttribute('Code', $data['Code']);
        $dom = new DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml->asXML());
        $dom->save($file);
    }
}