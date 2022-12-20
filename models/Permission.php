<?php

class Permission
{
    static function get($Code){
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        $permission = $CadiAyyad->xpath('//Permissions/Permission[@Code="'.$Code.'"]');
        echo 'CadiAyyad/Etablissement/Permissions/Permission[@Code="'.$Code.'"]';
        return $permission;
    }
}