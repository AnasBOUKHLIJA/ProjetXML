<?php

class AgentScolariteController
{
    static function get($code){
    return AgentScolarite::get($code);
    }
    static function getAll(){
        return AgentScolarite::getAll();
    }
}