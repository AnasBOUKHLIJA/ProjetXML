<?php

class ProfesseurController
{
    static function get($code){
        return Professeur::get($code);
    }
}