<?php
    $data = json_decode(file_get_contents("php://input"));
    $langue = $data->langue;
    setcookie('langue', '', time() - 3600, '/');
    setcookie("langue", $langue, time() + (86400 * 30), "/");
    echo $_COOKIE['langue'];
