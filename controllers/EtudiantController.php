<?php

class EtudiantController
{
    static function get($code){
        return Etudiant::get($code);
    }
}