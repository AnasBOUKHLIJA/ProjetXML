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
        Permission::add($data['Code'],array('Supperadmin'=> 0,'Addsupperadmin'=> 0,'Removesuperadmin'=> 0,'Editsuperadmin'=> 0,'Addprofesseur'=> 0,'Professeur'=> 1,'Removeprofesseur'=> 0,'Editprofesseur'=> 0,'Agentscolarite'=> 1,'Addagentscolarite'=> 1,'Removeagentscolarite'=> 1,'Editagentscolarite'=> 1,'Adddirecteur'=> 0,'Directeur'=> 0,'Removedirecteur'=> 0,'Editdirecteur'=> 0,'Etudiant'=> 1,'Addetudiant'=> 1,'Removeetudiant'=> 1,'Editetudiant'=> 1,'Abscence'=> 1,'Addabscence'=> 0,'Removeabscence'=> 0,'Editabscence'=> 0,'Departement'=> 1,'Adddepartement'=> 0,'Removedepartement'=> 0,'Editdepartement'=> 0,'Filiere'=> 0,'Addfiliere'=> 0,'Removefiliere'=> 0,'Editfiliere'=> 0,'Module'=> 0,'Addmodule'=> 0,'Removemodule'=> 0,'Editmodule'=> 0,'Element'=> 0,'Addelement'=> 0,'Removeelement'=> 0,'Editelement'=> 0,'Seance'=> 0,'Addseance'=> 0,'Removeseance'=> 0,'Editseance'=> 0));
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
    static function delete($code){
        $file = 'Database/Database.xml';
        $CadiAyyad  = simplexml_load_file($file);
        $targetPersonne =  $CadiAyyad ->xpath('//Personnes/Personne[@Code= "'.$code.'"]');
        $domRefPersonne = dom_import_simplexml($targetPersonne[0]);
        $domRefPersonne->parentNode->removeChild($domRefPersonne);
        $targetPermission =  $CadiAyyad ->xpath('//Permissions/Permission[@Code= "'.$code.'"]');
        $domRefPermission = dom_import_simplexml($targetPermission[0]);
        $domRefPermission->parentNode->removeChild($domRefPermission);
        $target =  $CadiAyyad ->xpath('//AgentScolarites/AgentScolarite[@Code="'.$code.'"]');
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