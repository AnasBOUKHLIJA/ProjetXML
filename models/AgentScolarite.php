<?php

class AgentScolarite
{
    static function get($code){
        return Personne::get($code);
    }
}