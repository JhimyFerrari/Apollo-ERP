<?php
session_start();
function autoload($class_name) {
    $directories = array(
        'lib/',
        'lib/model/'
    );
    foreach ($directories as $directory) {
        $filename = $directory . $class_name . '.php';
        if (file_exists($filename)) {
            include($filename);
            return;
        }
    }
}
spl_autoload_register('autoload');

    ?>