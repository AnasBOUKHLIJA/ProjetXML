<?php

class Absence
{
    static function get($etudiant,$seance){
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        return $CadiAyyad->xpath('//Absences/Absence[@Etudiant="'.$etudiant.'" and @Seance="'.$seance.'"]');
    }
    static function getAllAbsenceForEtudiant($etudiant){
            $CadiAyyad = simplexml_load_file('Database/Database.xml');
            return $CadiAyyad->xpath('//Absences/Absence[@Etudiant="'.$etudiant.'"]');
    }
    static function add($etudiant,$seance){
        $file = 'Database/Database.xml';
        $xml = simplexml_load_file($file);
        $Absences = $xml->Etablissement->Absences;
        $Absence = $Absences->addChild('Absence');
        $Absence->addAttribute('Etudiant',$etudiant);
        $Absence->addAttribute('Seance',$seance);
        $dom = new DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml->asXML());
        $dom->save($file);
    }
}