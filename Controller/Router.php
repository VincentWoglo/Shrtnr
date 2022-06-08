<?php
    require('../vendor/autoload.php');
    use Phroute\Phroute\RouteCollector;
    use Controller\Router\Routing;
    use Controller\Functions;
    $router = new RouteCollector;
    global $View;
    $View = new Routing;


    $router->get("/app", $View->View("Form.php"));
    $router->get("/{id:a}", function($id){
        $Functions = new Functions;
        $Functions->RedirectToMainUrl($id);
    });
    
    $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['PATH_INFO']);
    // Print out the value returned from the dispatched function
    echo $response;
?>