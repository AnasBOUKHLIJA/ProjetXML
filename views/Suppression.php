<?php
    $data = json_decode(file_get_contents("php://input"));
    $target = $data->target;
    $code = $data->code;
    if($target == "seance"){
        SeanceController::delete($code);
    }elseif ($target == "element"){
        ElementController::delete($code);
    }elseif ($target == "module"){
        ModuleController::delete($code);
    }elseif ($target == "filiere"){
        FiliereController::delete($code);
    }elseif ($target == "departement"){
        DepartementController::delete($code);
    }
