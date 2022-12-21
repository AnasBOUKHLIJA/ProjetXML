<?php

class Etudiant
{
    static function get($code){
        return Personne::get($code);
    }
}