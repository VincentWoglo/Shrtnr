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

        public static function Controller($Directory, $Path, $Data = []){
            extract($Data);
            self::Load($Directory, $Path);
        }
        public static function View($Directory, $Path, $Data = []){
            extract($Data);
            self::Load($Directory, $Path);
        }
    }
?>