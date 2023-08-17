<?php
    namespace Controller;

    error_reporting(1);

    class Controller {

        public function __construct()
        {

        }

        /**
         * Checks if there are file exists in directory 
         * Redirect to 404 if file doesn't exist
         */
        private static function Load($Directory, $Path){
            $FullPath = __DIR__.'/../'.$Directory.'/'.$Path.'.php';

            if(file_exists($FullPath))
                require_once($FullPath);
            else
                self::View('Views', '404');
        }

        /**
         * Loads controllers from the Controller folder
         * Takes path and sends data to view in form of an array
         */
        public static function Make($ControllerName, $Data = []) : void
        {
            extract($Data);
            self::Load('Controller', $ControllerName);
        }

        /**
         * Loads page from the Views folder
         * Takes path and data sent to Controller
         */
        public static function View($ViewName, $Data = []) : void
        {
            extract($Data);
            self::Load("Views", $ViewName);
        }

        /**
         * Redirects to controller
         */
        public static function Redirect($ControllerName)
        {
            header('Location: '.$ControllerName);
        }

    }
?>