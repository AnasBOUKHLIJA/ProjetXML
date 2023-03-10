<?php

class SeanceController
{

    static  function get($code){
        return Seance::get($code);
    }

    static function getAll($Ele){
        return Seance::getAll($Ele);
    }

    static function add($data){
        $code = 0;
        $codeFil = strlen($data['element']);
        foreach (SeanceController::getAll($data['element']) as $item){
            if(strpos($item->attributes()->Code,$data['element'])  !== false){
                if($code < (int)substr($item->attributes()->Code ,4+$codeFil,strlen($item->attributes()->Code))){
                    $code = (int)substr($item->attributes()->Code,4+$codeFil,strlen($item->attributes()->Code));
                }
            }
        }
        $code = $code+1;
        $data['Code'] = $data['element'].'Sean'.$code;
        Seance::add($data);
        header('location: /ProjetXML/ElementDetails/'.$data['element'].'/succes');
    }
    static function delete($code){
        $element = SeanceController::get($code)->attributes()->Element;
       Seance::delete($code);
        echo "/ProjetXML/ElementDetails/".$element."/attention";
    }
}
// $daysOfWeek = array(
//     'Monday' => 'Lundi',
//     'Tuesday' => 'Mardi',
//     'Wednesday' => 'Mercredi',
//     'Thursday' => 'Jeudi',
//     'Friday' => 'Vendredi',
//     'Saturday' => 'Samedi',
//     'Sunday' => 'Dimanche'
// );