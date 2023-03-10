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
        $Module->addAttribute('Hide', 0);
        $Module->addChild('Module', $data['module']);
        $dom = new DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml->asXML());
        $dom->save($file);
    }
    static function delete($code){
        $file = 'Database/Database.xml';
        $CadiAyyad  = simplexml_load_file($file);
        foreach (ElementController::getByModule(Module::get($code)[0]->attributes()->Code) as $element){
            $targetElement =  $CadiAyyad ->xpath('//Elements/Element[@Code="'.$element->attributes()->Code.'"]');
            $domRefElement = dom_import_simplexml($targetElement[0]);
            $domRefElement->parentNode->removeChild($domRefElement);
            foreach (SeanceController::getAll($element->attributes()->Code) as $seance){
                $targetSeance =  $CadiAyyad ->xpath('//Seances/Seance[@Code= "'.$seance->attributes()->Code.'"]');
                $domRefSeance = dom_import_simplexml($targetSeance[0]);
                $domRefSeance->parentNode->removeChild($domRefSeance);
            }
        }
        $target =  $CadiAyyad ->xpath('//Modules/Module[@Code="'.$code.'"]');
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
    static function hide($code,$value){
        $file = 'Database/Database.xml';
        $CadiAyyad  = simplexml_load_file($file);
        $target =  $CadiAyyad ->xpath('//Modules/Module[@Code="'.$code.'"]');
        /*try{
           $target[0]->addAttribute('Hide',$value); 
        }catch(Exception $e){}*/
        try{
            $target[0]->attributes()->Hide = $value; 
        }catch(Exception $e){}
        $dom = new DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML( $CadiAyyad ->asXML());
        $dom->save($file);
    }
}

