<?php

spl_autoload_register(function ($class) {
    $baseDir = __DIR__ . '/src/';

    $class = str_replace('\\', '/', $class);

    $file = $baseDir . $class . '.php';

    if (file_exists($file)) {
        require_once $file;
    } else {
        $fileLower = $baseDir . strtolower($class) . '.php';
        if (file_exists($fileLower)) {
            require_once $fileLower;
        } else {
            echo "Autoload error: Cannot find class '$class' at $file\n";
        }
    }
});
