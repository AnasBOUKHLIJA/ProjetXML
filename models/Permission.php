<?php

class Permission
{
    static function get($Code): array {
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        $Permissions = $CadiAyyad->xpath('//Permissions/Permission[@Code="'.$Code.'"]');
        return array(
            'Addsupperadmin' => (string)$Permissions[0]->Addsupperadmin,
            'Removesuperadmin' => (string)$Permissions[0]->Removesuperadmin,
            'Editsuperadmin' => (string)$Permissions[0]->Editsuperadmin,
            'Addprofesseur' => (string)$Permissions[0]->Addprofesseur,
            'Removeprofesseur' => (string)$Permissions[0]->Removeprofesseur,
            'Editprofesseur' => (string)$Permissions[0]->Editprofesseur,
            'Addagentscolarite' => (string)$Permissions[0]->Addagentscolarite,
            'Removeagentscolarite' => (string)$Permissions[0]->Removeagentscolarite,
            'Editagentscolarite' => (string)$Permissions[0]->Editagentscolarite,
            'Adddirecteur' => (string)$Permissions[0]->Adddirecteur,
            'Removedirecteur' => (string)$Permissions[0]->Removedirecteur,
            'Editdirecteur' => (string)$Permissions[0]->Editdirecteur,
            'Addetudiant' => (string)$Permissions[0]->Addetudiant,
            'Removeetudiant' => (string)$Permissions[0]->Removeetudiant,
            'Editetudiant' => (string)$Permissions[0]->Editetudiant,
            'Addabscence' => (string)$Permissions[0]->Addabscence,
            'Removeabscence' => (string)$Permissions[0]->Removeabscence,
            'Editabscence' => (string)$Permissions[0]->Editabscence
        );
    }
}