<?php
spl_autoload_register('autoload');
function autoload($className)
{
    $array_paths = array(
        'controllers/',
        'database/',
        'models/',
       'views/'
    );

    foreach ($array_paths as $path) {
        $file = sprintf($path . '%s.php', $className);
        if (is_file($file)) {
            include_once $file;
            break;
        }
    }
}
