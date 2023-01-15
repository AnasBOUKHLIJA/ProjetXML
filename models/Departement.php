<?php

class Departement
{
    static function getAll(): array{
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        return $CadiAyyad->xpath('//Departements/Departement');
    }
    static function get($dept){
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        return $CadiAyyad->xpath('//Departements/Departement[@Code="'.$dept.'"]');
    }
    static function getChefDepartement($Chef_departement){
       return Personne::get($Chef_departement);
    }
    static function getNombreFiliere($dept){
        return Filiere::getByDepartement($dept);
    }
    static function getNombreProfesseur($dept){
        return Professeur::getByDepartement($dept);
    }
    static function add($data){
        $file = 'Database/Database.xml';
        $xml = simplexml_load_file($file);
        $Departements = $xml->Etablissement->Departements;
        $Departement = $Departements->addChild('Departement');
        $Departement->addAttribute('Chef_departement', $data['chef_departement']);
        $Departement->addAttribute('Code', $data['Code']);
        $Departement->addChild('Departement', $data['departement']);
        $dom = new DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml->asXML());
        $dom->save($file);
    }
    static function delete($code){
        $file = 'Database/Database.xml';
        $CadiAyyad  = simplexml_load_file($file);
        foreach (FiliereController::getByDepartement(Departement::get($code)[0]->attributes()->Code) as $filiere){
            $targetFiliere =  $CadiAyyad ->xpath('//Filieres/Filiere[@Code="'.$filiere->attributes()->Code.'"]');
            $domRefFiliere = dom_import_simplexml($targetFiliere[0]);
            $domRefFiliere->parentNode->removeChild($domRefFiliere);
            foreach (ModuleController::getByFiliere($filiere->attributes()->Code) as $module){
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
        }
        $target =  $CadiAyyad ->xpath('//Departements/Departement[@Code="'.$code.'"]');
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