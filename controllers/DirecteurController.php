<?php

class DirecteurController
{
    static function get($code){
        return Directeur::get($code);
    }
}