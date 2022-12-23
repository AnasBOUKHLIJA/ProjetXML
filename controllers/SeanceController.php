<?php

class SeanceController
{
    static function getAll($Ele){
        return Seance::getAll($Ele);
    }

 
    static function add($data){
        $code = 0;
        $codeFil = strlen($data['element']);
        foreach (SeanceController::getAll($data['element']) as $item){
            if(strpos($item->attributes()->Code,$data['element'])  !== false){
                if($code < (int)substr($item->attributes()->Code ,3+$codeFil,strlen($item->attributes()->Code))){
                    $code = (int)substr($item->attributes()->Code,3+$codeFil,strlen($item->attributes()->Code));
                }
            }
        }
        $code = $code+1;
        $data['Code'] = $data['element'].'Sean'.$code;
        Seance::add($data);
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