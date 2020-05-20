<?php

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Start a session
//Require the autoload file
require_once("vendor/autoload.php");
require_once("models/data.php");

session_start();

//Instantiate the F3 Base class
$f3 = Base::instance();
$controller = new Controllers($f3);

$f3->route('GET /', function() {
    $GLOBALS['controller']->home();
});

$f3->route('GET|POST /survey', function($f3) {
    $GLOBALS['controller']->survey($f3);
});

$f3->route('GET /summary', function() {
    $GLOBALS['controller']->summary();
});

//Run F3
$f3->run();
