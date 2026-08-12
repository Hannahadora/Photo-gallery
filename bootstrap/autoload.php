<?php

function classAutoLoader($class) {
    // Use __DIR__ for absolute path - more reliable
    $path = __DIR__ . "/../app/Models/{$class}.php";
    if (file_exists($path)) {
        require_once($path);
    } else {
        die("The file {$class}.php could not be found.");
    }
}


function serviceAutoLoader($class) {
    // Use realpath for absolute path - more reliable
    $baseDir = realpath(__DIR__ . "/..");
    $path = $baseDir . "/app/Services/{$class}.php";
    if (file_exists($path)) {
        require_once($path);
    } else {
        die("The file {$class}.php could not be found at: " . $path);
    }
}

// Register the autoload function
spl_autoload_register('classAutoLoader');
spl_autoload_register('serviceAutoLoader');

?>