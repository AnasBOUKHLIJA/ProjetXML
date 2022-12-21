<?php

class SuperAdmin
{
    static function get($code){
        return Personne::get($code);
    }
}