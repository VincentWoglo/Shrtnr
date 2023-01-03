<?php

    namespace Controller\Validation;
    include_once(__DIR__.'/../../vendor/autoload.php');
    session_start();
    error_reporting(0);
    use Model\CRUD;
    use Controller\Functions;

    class InputValidation
    {
        // function ValidateUrlInput(){
        //     $a = 0;
        //     if( $a === 0 ){ echo "A is equals top zero"; }
        //     else{ echo "No, A is not enquals to zero"; }
        // }

        function ValidateInput(){
            $Error = [];
            //if( $_REQUEST["GenerateUrlBtn"] ){ 
                $MatchedRegex = preg_match("%^((https?://)|(www\.))([a-z0-9-].?)+(:[0-9]+)?(/.*)?$%i",$_REQUEST["UrlInput"]);
                if(empty($_REQUEST["UrlInput"])){ array_push($Error, "Please enter a URL"); }
                
                //If the PregMatch url is not what it should be push same error to same array
                if( $MatchedRegex === 0 ){ array_push( $Error, "Please URL should have https://www. or www." ); }
                elseif( count($Error) === 0 ){ 
                    /*Generate the slug for users*/
                    $Characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
                    $FinalResult = "";
                    $MaxRandomized = 7;
                    $Functions = new Functions;
                    $GeneratedSlug = $Functions->StoreGeneratedUrl($MaxRandomized, $Characters, $FinalResult, $_REQUEST["UrlInput"]);
                    $_SESSION['GeneratedSlug'] = $GeneratedSlug;
                    //var_dump($GeneratedSlug);
                    // if($_SESSION['GeneratedSlug']){
                    //     unset($_SESSION['GeneratedSlug']);
                    // }
                    
                }
                 
            //}
            else{ /*echo "Not Clicked"; Do Nothing*/}

            //Display errors in the array
            echo $Error[0];
            echo $GeneratedSlug;
            //echo $_REQUEST;
            //var_dump($Error);
        }
    }
    
    $InputValidation = new InputValidation;
    $InputValidation->ValidateInput();
    
?>