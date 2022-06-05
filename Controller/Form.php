<?php
    require('../vendor/autoload.php');
    use Model\DataBase;
    use Controller\Functions;

    $Connections = new DataBase;
    $Connections->Connect();

    //Generate numbers and letter. Max = 7
    //Store generated value in database along with the Url passed in

    $Characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $FinalResult = "";
    $MaxRandomized = 7;
    $Functions = new Functions;
    $GeneratedSlug = $Functions->GenerateUrlSlug($MaxRandomized, $Characters, $FinalResult);
    $Functions->StoreGeneratedUrl($GeneratedSlug);


    //Send data to the index.html in the Views folder
    $loader = new \Twig\Loader\FilesystemLoader('../Public/Views');
    $twig = new \Twig\Environment($loader);
    echo $twig->render("index.html", [
        "Slug" => $GeneratedSlug,
        "OriginalUrl" => $_REQUEST["UrlInput"]
    ]);
?>