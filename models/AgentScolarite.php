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
}