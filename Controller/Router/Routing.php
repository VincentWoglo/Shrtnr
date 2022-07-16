<?php
    namespace Controller\Router;
    class Routing
    {
        function View($File){
            require_once($File);
        }
    }
    
    var_dump(__DIR__);
?>