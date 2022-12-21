<?php

class ModuleController
{
    static function get($mod): string{
        return (string)Module::get($mod)[0]->Module;
    }
    static function getByFiliere($fil){
        return Module::getByFiliere($fil);
    }
    static function getCoordonateur($coordonateur){
        $cor = Module::getCoordonateur($coordonateur);
        return $cor['Nom'].' '.$cor['Prenom'];
    }
}