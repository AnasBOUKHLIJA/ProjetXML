<?php

class Element
{
    static function getAll(): array{
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        return $CadiAyyad->xpath('//Elements/Element');
    }
    static function get($code){
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        return $CadiAyyad->xpath('//Elements/Element[@Code="'.$code.'"]')[0];
    }
    static function getByModule($mod){
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        return $CadiAyyad->xpath('//Elements/Element[@Module = "'.$mod.'"]');
    }
    static function getEnseignant($enseignant){
        return Personne::get($enseignant);
    }
    static function add($data){
        $file = 'Database/Database.xml';
        $xml = simplexml_load_file($file);
        $Elements = $xml->Etablissement->Elements;
        $Element = $Elements->addChild('Element');
        $Element->addAttribute('Module', $data['module']);
        $Element->addAttribute('Enseignant', $data['enseignant']);
        $Element->addAttribute('Code', $data['Code']);
        $Element->addChild('Element', $data['element']);
        $Element->addChild('NombreHeures', $data['nombreheures']);
        $dom = new DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml->asXML());
        $dom->save($file);
    }
    static function delete($code){
        $file = 'Database/Database.xml';
        $CadiAyyad  = simplexml_load_file($file);        
        foreach (SeanceController::getAll(Element::get($code)->attributes()->Code) as $seance){
            $targetSeance =  $CadiAyyad ->xpath('//Seances/Seance[@Code= "'.$seance->attributes()->Code.'"]');
            $domRefSeance = dom_import_simplexml($targetSeance[0]);
            $domRefSeance->parentNode->removeChild($domRefSeance);
            // SeanceController::delete($seance->attributes()->Code);
        }
        $target =  $CadiAyyad ->xpath('//Elements/Element[@Code="'.$code.'"]');
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