<?php

class Permission
{
    static function get($Code): array {
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        $Permissions = $CadiAyyad->xpath('//Permissions/Permission[@Code="'.$Code.'"]');
        return array(
            'Supperadmin' => (string)$Permissions[0]->Supperadmin,
            'Addsupperadmin' => (string)$Permissions[0]->Addsupperadmin,
            'Removesuperadmin' => (string)$Permissions[0]->Removesuperadmin,
            'Editsuperadmin' => (string)$Permissions[0]->Editsuperadmin,
            'Addprofesseur' => (string)$Permissions[0]->Addprofesseur,
            'Professeur' => (string)$Permissions[0]->Professeur,
            'Removeprofesseur' => (string)$Permissions[0]->Removeprofesseur,
            'Editprofesseur' => (string)$Permissions[0]->Editprofesseur,
            'Agentscolarite' => (string)$Permissions[0]->Agentscolarite,
            'Addagentscolarite' => (string)$Permissions[0]->Addagentscolarite,
            'Removeagentscolarite' => (string)$Permissions[0]->Removeagentscolarite,
            'Editagentscolarite' => (string)$Permissions[0]->Editagentscolarite,
            'Adddirecteur' => (string)$Permissions[0]->Adddirecteur,
            'Directeur' => (string)$Permissions[0]->Directeur,
            'Removedirecteur' => (string)$Permissions[0]->Removedirecteur,
            'Editdirecteur' => (string)$Permissions[0]->Editdirecteur,
            'Etudiant' => (string)$Permissions[0]->Etudiant,
            'Addetudiant' => (string)$Permissions[0]->Addetudiant,
            'Removeetudiant' => (string)$Permissions[0]->Removeetudiant,
            'Editetudiant' => (string)$Permissions[0]->Editetudiant,
            'Abscence' => (string)$Permissions[0]->Abscence,
            'Addabscence' => (string)$Permissions[0]->Addabscence,
            'Removeabscence' => (string)$Permissions[0]->Removeabscence,
            'Editabscence' => (string)$Permissions[0]->Editabscence,
            'Departement' => (string)$Permissions[0]->Departement,
            'Adddepartement' => (string)$Permissions[0]->Adddepartement,
            'Removedepartement' => (string)$Permissions[0]->Removedepartement,
            'Editdepartement' => (string)$Permissions[0]->Editdepartement,
            'Filiere' => (string)$Permissions[0]->Filiere,
            'Addfiliere' => (string)$Permissions[0]->Addfiliere,
            'Removefiliere' => (string)$Permissions[0]->Removefiliere,
            'Editfiliere' => (string)$Permissions[0]->Editfiliere,
            'Module' => (string)$Permissions[0]->Module,
            'Addmodule' => (string)$Permissions[0]->Addmodule,
            'Removemodule' => (string)$Permissions[0]->Removemodule,
            'Editmodule' => (string)$Permissions[0]->Editmodule,
            'Element' => (string)$Permissions[0]->Element,
            'Addelement' => (string)$Permissions[0]->Addelement,
            'Removeelement' => (string)$Permissions[0]->Removeelement,
            'Editelement' => (string)$Permissions[0]->Editelement,
            'Seance' => (string)$Permissions[0]->Seance,
            'Addseance' => (string)$Permissions[0]->Addseance,
            'Removeseance' => (string)$Permissions[0]->Removeseance,
            'Editseance' => (string)$Permissions[0]->Editseance
        );
    }
    static function add($code,$permission){
        $file = 'Database/Database.xml';
        $CadiAyyad = simplexml_load_file($file);
        $Permissions = $CadiAyyad->Etablissement->Permissions;
        $Permission = $Permissions->addChild('Permission');
        $Permission->addAttribute('Code', $code);
        $Permission->addChild('Supperadmin', $permission['Supperadmin']);
        $Permission->addChild('Addsupperadmin', $permission['Addsupperadmin']);
        $Permission->addChild('Removesuperadmin', $permission['Removesuperadmin']);
        $Permission->addChild('Editsuperadmin', $permission['Editsuperadmin']);
        $Permission->addChild('Addprofesseur', $permission['Addprofesseur']);
        $Permission->addChild('Professeur', $permission['Professeur']);
        $Permission->addChild('Removeprofesseur', $permission['Removeprofesseur']);
        $Permission->addChild('Editprofesseur', $permission['Editprofesseur']);
        $Permission->addChild('Agentscolarite', $permission['Agentscolarite']);
        $Permission->addChild('Addagentscolarite', $permission['Addagentscolarite']);
        $Permission->addChild('Removeagentscolarite', $permission['Removeagentscolarite']);
        $Permission->addChild('Editagentscolarite', $permission['Editagentscolarite']);
        $Permission->addChild('Adddirecteur', $permission['Adddirecteur']);
        $Permission->addChild('Directeur', $permission['Directeur']);
        $Permission->addChild('Removedirecteur', $permission['Removedirecteur']);
        $Permission->addChild('Editdirecteur', $permission['Editdirecteur']);
        $Permission->addChild('Etudiant', $permission['Etudiant']);
        $Permission->addChild('Addetudiant', $permission['Addetudiant']);
        $Permission->addChild('Removeetudiant', $permission['Removeetudiant']);
        $Permission->addChild('Editetudiant', $permission['Editetudiant']);
        $Permission->addChild('Abscence', $permission['Abscence']);
        $Permission->addChild('Addabscence', $permission['Addabscence']);
        $Permission->addChild('Removeabscence', $permission['Removeabscence']);
        $Permission->addChild('Editabscence', $permission['Editabscence']);
        $Permission->addChild('Departement', $permission['Departement']);
        $Permission->addChild('Adddepartement', $permission['Adddepartement']);
        $Permission->addChild('Removedepartement', $permission['Removedepartement']);
        $Permission->addChild('Editdepartement', $permission['Editdepartement']);
        $Permission->addChild('Filiere', $permission['Filiere']);
        $Permission->addChild('Addfiliere', $permission['Addfiliere']);
        $Permission->addChild('Removefiliere', $permission['Removefiliere']);
        $Permission->addChild('Editfiliere', $permission['Editfiliere']);
        $Permission->addChild('Element', $permission['Element']);
        $Permission->addChild('Addelement', $permission['Addelement']);
        $Permission->addChild('Removeelement', $permission['Removeelement']);
        $Permission->addChild('Editelement', $permission['Editelement']);
        $Permission->addChild('Seance', $permission['Seance']);
        $Permission->addChild('Addseance', $permission['Addseance']);
        $Permission->addChild('Removeseance', $permission['Removeseance']);
        $Permission->addChild('Editseance', $permission['Editseance']);
        $dom = new DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($CadiAyyad->asXML());
        $dom->save($file);
    }
}