<?php 
    $data = json_decode(file_get_contents("php://input"));
    $target = $data->target;
    $code = $data->code;
    $value = $data->value;
    if($target == "module"){
        ModuleController::hide($code,$value);
    }