<?php

class Professeur
{
    static function get($code){
        return Personne::get($code);
    }
}