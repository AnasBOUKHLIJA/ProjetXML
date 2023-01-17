<?php

class AgentScolariteController
{
    static function get($code){
    return AgentScolarite::get($code);
    }
    static function getAll(){
        return AgentScolarite::getAll();
    }
    static function add($data){
        if(!Personne::verifyUsernameIfExist($data['username'])){
            //print_r($data);
            $code = 0;
            foreach (AgentScolariteController::getAll() as $item){
                // print substr($item['Code'],1,strlen($item['Code']));
                if($code < (int)substr($item['Code'],1,strlen($item['Code']))){
                    $code = (int)substr($item['Code'],1,strlen($item['Code']));
                }
            }
            $code = $code+1;
            $data['Code'] = 'S'.$code;
            AgentScolarite::add($data);
            header('location: /ProjetXML/ajoutAgentScolarite/succes');
        }else{
            header('location: /ProjetXML/ajoutAgentScolarite/erreur');
        }

    }
    static function delete($code){
        AgentScolarite::delete($code);
        echo "/ProjetXML/agentScolarites/attention";
    }
}