<?php
    include_once(__DIR__.'/../vendor/autoload.php');
    use Controller\Validation\InputValidation;
    session_start();
    error_reporting(1);
    
    //use constructor to get $_REQUEST inputs in the InputValidation class
    //and also the Funtions class
    $InputValidation = new InputValidation;
    $InputValidation->ValidateInput();
    $Input = $_REQUEST["UrlInput"];
    $InputBtn = $_REQUEST["GenerateUrlBtn"];
    //var_dump($Input);
    //var_dump($InputBtn);
    // echo $_SESSION["ErrorStatus"];
    
    // $_SESSION["GenerateUrlBtn"] = $InputBtn;
    // $_SESSION["UrlInput"] = $Input;

    //use session to gain access to GeneratedSlug
    //Send data to the index.html in the Views folder
    $loader = new \Twig\Loader\FilesystemLoader('../Public/Views');
    $twig = new \Twig\Environment($loader);
    echo $twig->render("index.html", [
        //"Slug" => $_SESSION['GeneratedSlug'],
        "OriginalUrl" => $_REQUEST["UrlInput"], 
        "ErrorStatus" => $_SESSION["ErrorStatus"]
    ]);
?>