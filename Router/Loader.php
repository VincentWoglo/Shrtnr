<?php
    namespace Router;
    use PHPUnit\Framework\Constraint\FileExists;

    class Loader{

        //Takes desired directory and path to check if file  in desired directory
        //file_exists returns a bool
        private static function Load($Directory, $Path ){
            $FullPath = __DIR__.'/../'.$Directory.'/'.$Path.'.php';

            if(file_exists($FullPath))
                require_once($FullPath);
            else
                self::View('Views','404');
        }

        //Refactor Controller and View to be one function
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