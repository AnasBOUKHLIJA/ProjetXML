<?php

class ProfesseurController
{
    static function get($code){
        return Professeur::get($code);
    }
    static function getAll(){
        return Professeur::getAll();
    }
}