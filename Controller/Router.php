<?php
    include_once('../vendor/autoload.php');
    error_reporting(0);
    use Phroute\Phroute\RouteCollector;
    use Controller\Router\Routing;
    use Controller\Functions;
    $router = new RouteCollector;
   // $View = new Routing;


    $router->get("/app", require_once("Form.php"));
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