<?php
    require('../vendor/autoload.php');
    use Phroute\Phroute\RouteCollector;

    $router = new RouteCollector();
    
    $router->get("/", function(){
        echo "This is just a test for this router";
    });
    $router->get("/app", function(){
        var_dump("This is just a test for this router. App Page");
    });
?>