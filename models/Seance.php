<?php

class Seance
{
    static function getAll($Ele): array{
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        return $CadiAyyad->xpath('//Seances/Seance[@Element= "'.$Ele.'"]');
    }
    static function add($data){
        $file = 'Database/Database.xml';
        $xml = simplexml_load_file($file);
        $Seances = $xml->Etablissement->Seances;
        $Seance = $Seances->addChild('Seance');
        $Seance->addAttribute('Element', $data['element']);
        $Seance->addAttribute('Salle', $data['salle']);
        $Seance->addAttribute('Code', $data['Code']);
        $Seance->addChild('Jour', $data['jour']);
        $Seance->addChild('DateDebut', $data['datedebut']);
        $Seance->addChild('DateFin', $data['datefin']);
        $dom = new DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml->asXML());
        $dom->save($file);
    }
}