<?php

    namespace Controller\Validation;
    include_once(__DIR__.'/../../vendor/autoload.php');
    session_start();
    error_reporting(1);
    use Model\CRUD;
    use Controller\UrlController;

    class InputValidation
    {
        function ValidateInput(){
            $Error = [];
            if ($_REQUEST["GenerateUrlBtn"]){ 
                $MatchedRegex = preg_match("%^((https?://)|(www\.))([a-z0-9-].?)+(:[0-9]+)?(/.*)?$%i",$_REQUEST["UrlInput"]);

                if (empty($_REQUEST["UrlInput"])) array_push($Error, "Please enter a URL"); 
                
                //If the PregMatch url is not what it should be push same error to same array
                if ($MatchedRegex === 0) 
                    array_push($Error, "Please URL should have https://www. or www.");

                if (count($Error) === 0){ 
                    /*Generate the slug for users*/
                    $Characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
                    //$FinalResult = '';
                    $MaxRandomized = 7;

                    $UrlController = new UrlController;
                    $GeneratedSlug = $UrlController->StoreGeneratedUrl($MaxRandomized, $Characters, $_REQUEST["UrlInput"]);
                }
                 
            }

            //Display errors in the array
            $FinalResult = array(
                'Error' => $Error[0],
                'GeneratedSlug' => $GeneratedSlug
            );
            echo json_encode($FinalResult);
        }
    }
    
    $InputValidation = new InputValidation;
    $InputValidation->ValidateInput();
    
?>