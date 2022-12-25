<?php

class PermissionController
{
    static function get($Code): array {
        return Permission::get($Code);
    }
    static function modify($data){
        $newData = array();
        $newData['Supperadmin']  = PermissionController::getValue($data['Supperadmin']);
        $newData['Addsupperadmin']  = PermissionController::getValue($data['Addsupperadmin']);
        $newData['Removesuperadmin']  = PermissionController::getValue($data['Removesuperadmin']);
        $newData['Editsuperadmin']  = PermissionController::getValue($data['Editsuperadmin']);
        $newData['Addprofesseur']  = PermissionController::getValue($data['Addprofesseur']);
        $newData['Professeur']  = PermissionController::getValue($data['Professeur']);
        $newData['Removeprofesseur']  = PermissionController::getValue($data['Removeprofesseur']);
        $newData['Editprofesseur']  = PermissionController::getValue($data['Editprofesseur']);
        $newData['Agentscolarite']  = PermissionController::getValue($data['Agentscolarite']);
        $newData['Addagentscolarite']  = PermissionController::getValue($data['Addagentscolarite']);
        $newData['Removeagentscolarite']  = PermissionController::getValue($data['Removeagentscolarite']);
        $newData['Editagentscolarite']  = PermissionController::getValue($data['Editagentscolarite']);
        $newData['Adddirecteur']  = PermissionController::getValue($data['Adddirecteur']);
        $newData['Directeur']  = PermissionController::getValue($data['Directeur']);
        $newData['Removedirecteur']  = PermissionController::getValue($data['Removedirecteur']);
        $newData['Editdirecteur']  = PermissionController::getValue($data['Editdirecteur']);
        $newData['Etudiant']  = PermissionController::getValue($data['Etudiant']);
        $newData['Addetudiant']  = PermissionController::getValue($data['Addetudiant']);
        $newData['Removeetudiant']  = PermissionController::getValue($data['Removeetudiant']);
        $newData['Editetudiant']  = PermissionController::getValue($data['Editetudiant']);
        $newData['Abscence']  = PermissionController::getValue($data['Abscence']);
        $newData['Addabscence']  = PermissionController::getValue($data['Addabscence']);
        $newData['Removeabscence']  = PermissionController::getValue($data['Removeabscence']);
        $newData['Editabscence']  = PermissionController::getValue($data['Editabscence']);
        $newData['Departement']  = PermissionController::getValue($data['Departement']);
        $newData['Adddepartement']  = PermissionController::getValue($data['Adddepartement']);
        $newData['Removedepartement']  = PermissionController::getValue($data['Removedepartement']);
        $newData['Editdepartement']  = PermissionController::getValue($data['Editdepartement']);
        $newData['Filiere']  = PermissionController::getValue($data['Filiere']);
        $newData['Addfiliere']  = PermissionController::getValue($data['Addfiliere']);
        $newData['Removefiliere']  = PermissionController::getValue($data['Removefiliere']);
        $newData['Editfiliere']  = PermissionController::getValue($data['Editfiliere']);
        $newData['Module']  = PermissionController::getValue($data['Module']);
        $newData['Addmodule']  = PermissionController::getValue($data['Addmodule']);
        $newData['Removemodule']  = PermissionController::getValue($data['Removemodule']);
        $newData['Editmodule']  = PermissionController::getValue($data['Editmodule']);
        $newData['Element']  = PermissionController::getValue($data['Element']);
        $newData['Addelement']  = PermissionController::getValue($data['Addelement']);
        $newData['Removeelement']  = PermissionController::getValue($data['Removeelement']);
        $newData['Editelement']  = PermissionController::getValue($data['Editelement']);
        $newData['Seance']  = PermissionController::getValue($data['Seance']);
        $newData['Addseance']  = PermissionController::getValue($data['Addseance']);
        $newData['Removeseance']  = PermissionController::getValue($data['Removeseance']);
        $newData['Editseance']  = PermissionController::getValue($data['Editseance']);
        Permission::modify($data['personne'],$newData);
    }
    static function getValue($permission){
        if($permission) return 1;
        return 0;
    }
}