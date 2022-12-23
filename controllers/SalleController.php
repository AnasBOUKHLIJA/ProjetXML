<?php

class SalleController
{
    static function get($code){
        return Salle::get($code)[0];
    }
    static function getAll(){
        return Salle::getAll();
    }

}