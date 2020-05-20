<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
require_once('vendor/autoload.php');
require_once('models/data.php');

//Instantiate the F3 Base class
$f3 = Base::instance();

$f3->route('GET / ', function ($f3) {

    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET|POST /survey ', function ($f3) {
    $questions = getMidtermQuestions();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_SESSION['questions'] = $_POST['questions'];
        $f3->reroute('summary');
    }

    $f3->set('questions', $questions);

    $view = new Template();
    echo $view->render('views/survey.html');
});

$f3-> run();
