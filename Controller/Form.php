<?php
    require('../vendor/autoload.php');
    use Model\DataBase;

    
    $Connections = new DataBase;
    $Connections->Connect();

    $Loader = new \Twig\Loader\FilesystemLoader('../Public/Views/');
    $Twig = new \Twig\Environment($Loader);

    echo $Twig->render('index.html', [
        'name' => 'Fabien'
    ]);
?>