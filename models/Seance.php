<?php

class Seance
{
    static function getAll(): array{
        $CadiAyyad = simplexml_load_file('Database/Database.xml');
        return $CadiAyyad->xpath('//Seances/Seance');
    }
}