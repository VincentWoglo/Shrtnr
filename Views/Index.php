<?php
    // include_once(__DIR__.'/../vendor/autoload.php');
    use Controller\Validation\InputValidation;
    session_start();
    error_reporting(1);
    echo "sd";
    
    $InputValidation = new InputValidation;
    $InputValidation->ValidateInput();
    $Input = $_REQUEST["UrlInput"];
    $InputBtn = $_REQUEST["GenerateUrlBtn"];
    
    $loader = new \Twig\Loader\FilesystemLoader('../Views/Template');
    $twig = new \Twig\Environment($loader);
    echo $twig->render("index.html");
?>