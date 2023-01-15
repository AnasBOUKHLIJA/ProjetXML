<?php

class Seance
{
    static  function get($code){
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        return $CadiAyyad->xpath('//Seances/Seance[@Code= "'.$code.'"]')[0];
    }
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
        $Seance->addChild('Semestre', $data['semestre']);
        $Seance->addChild('Semaine', $data['semaine']);
        $dom = new DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml->asXML());
        $dom->save($file);
    }
    static function delete($code){
        $file = 'Database/Database.xml';
        $CadiAyyad  = simplexml_load_file($file);
        $target =  $CadiAyyad ->xpath('//Seances/Seance[@Code= "'.$code.'"]');
        if ($target) {
            $domRef = dom_import_simplexml($target[0]);
            $domRef->parentNode->removeChild($domRef);
            $dom = new DOMDocument('1.0');
            $dom->preserveWhiteSpace = false;
            $dom->formatOutput = true;
            $dom->loadXML( $CadiAyyad ->asXML());
            $dom->save($file);
        }
    }
}