<?php
    namespace Router;

    class Loader{
        private static function Load($Directory, $Path){
            $FullPath = __DIR__.'/../'.$Directory.'/'.$Path.'.php';

            if(file_exists($FullPath))
                require_once($FullPath);
            else
                self::View('Views', '404');
        }

        public static function Controller($Path, $Data = []){
            extract($Data);
            self::Load("Controller", $Path);
            return $Data;
        }
        public static function View($Path, $Data = []){
            extract($Data);
            self::Load("Views", $Path);
        }
    }
?>