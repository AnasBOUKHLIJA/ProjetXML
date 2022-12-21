<?php

class Directeur
{
    static function get($code){
        return Personne::get($code);
    }
}