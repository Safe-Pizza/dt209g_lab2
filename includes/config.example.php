<?php

$devEnv = true; // Bool for development enviroment

if ($devEnv) {
    //Active error-msg
    error_reporting(-1);
    ini_set("display_errors", 1);
}

// Autoloader: loads classes automatic
spl_autoload_register(function (string $class) {
    require __DIR__ . '/classes/' . $class . '.class.php';
});

if ($devEnv) {
    //local database settings
    define("DBHOST", "yourhost");
    define("DBUSER", "username");
    define("DBPASSWORD", "yourpassword");
    define("DBDATABASE", "nameofdatabase");
} else {
    //published database settings
    define("DBHOST", "yourhost");
    define("DBUSER", "username");
    define("DBPASSWORD", "yourpassword");
    define("DBDATABASE", "nameofdatabase");
}
