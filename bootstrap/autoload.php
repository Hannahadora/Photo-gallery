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

// Register the autoload function
spl_autoload_register('classAutoLoader');


?>