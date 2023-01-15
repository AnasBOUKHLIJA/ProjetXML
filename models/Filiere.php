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
    static function delete($code){
        $file = 'Database/Database.xml';
        $CadiAyyad  = simplexml_load_file($file);
        foreach (ModuleController::getByFiliere(Filiere::get($code)[0]->attributes()->Code) as $module){
            $targetModule =  $CadiAyyad ->xpath('//Modules/Module[@Code="'.$module->attributes()->Code.'"]');
            $domRefModule = dom_import_simplexml($targetModule[0]);
            $domRefModule->parentNode->removeChild($domRefModule);
            foreach (ElementController::getByModule($module->attributes()->Code) as $element){
                $targetElement =  $CadiAyyad ->xpath('//Elements/Element[@Code="'.$element->attributes()->Code.'"]');
                $domRefElement = dom_import_simplexml($targetElement[0]);
                $domRefElement->parentNode->removeChild($domRefElement);
                foreach (SeanceController::getAll($element->attributes()->Code) as $seance){
                    $targetSeance =  $CadiAyyad ->xpath('//Seances/Seance[@Code= "'.$seance->attributes()->Code.'"]');
                    $domRefSeance = dom_import_simplexml($targetSeance[0]);
                    $domRefSeance->parentNode->removeChild($domRefSeance);
                }
            }
        }
        $target =  $CadiAyyad ->xpath('//Filieres/Filiere[@Code="'.$code.'"]');
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