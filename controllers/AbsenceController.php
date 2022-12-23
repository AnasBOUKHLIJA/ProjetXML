<?php

class AbsenceController
{
    static function get($etudiant,$seance){
        return Absence::get($etudiant,$seance);
    }
    static function getAllAbsenceForEtudiant($etudiant){
        return Absence::getAllAbsenceForEtudiant($etudiant);
    }
    static function add($data){
        foreach ($data['check_list'] as $item){
            if(!Absence::get($item,$data['seance'])){
                Absence::add($item,$data['seance']);
            }
        }
    }

}