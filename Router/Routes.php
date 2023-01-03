<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    
    use Router\Loader;
    use Phroute\Phroute\RouteCollector;
    use Controller\Functions;
    $router = new RouteCollector;

    $router->get("/app", function(){
        Loader::Controller('Controller','App');
    });
    $router->get("/", function(){
        header("Location: http://localhost/Shrtnr/Controller/Router.php/app");
    });
    $router->get("/{id:a}", function($id){
        $Functions = new Functions;
        $Functions->RedirectToMainUrl($id);
    });
    $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['PATH_INFO']);
    // Print out the value returned from the dispatched function
    echo $response;
?>