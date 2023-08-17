<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    
    use Router\Loader;
    use Phroute\Phroute\RouteCollector;
    use Controller\Controller;
    use Controller\UrlController;

    $router = new RouteCollector;

    $router->get("/app", function(){
        Controller::Make('App');
    });

    $router->get("/", function(){
        Controller::Redirect('Controller', 'App');
        // header("Location: http://localhost/Shrtnr/Controller/Router.php/app");
    });
    $router->get("/test", function(){
        Controller::Redirect('Controller', 'App');
        // header("Location: http://localhost/Shrtnr/Controller/Router.php/app");
    });

    $router->get("/{id:a}", function($id){
        UrlController::RedirectToMainUrl($id);
    });
    
    //Show 404 if route doesn't exist
    $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['PATH_INFO']);
    // Print out the value returned from the dispatched function
    echo $response;
?>