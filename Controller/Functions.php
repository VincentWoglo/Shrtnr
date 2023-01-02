<?php
    namespace Controller;
    include_once(__DIR__.'/../vendor/autoload.php');
    error_reporting(1);
    
    use Model\CRUD;
    use Controller\Functions;
    session_start();

    class Functions
    {
        //Generating max string of 7 digits
        //$MaxRandomized, $Characters, $FinalResult
        function GenerateUrlSlug($MaxRandomized, $Characters, $FinalResult)
        {
            
            for($I=0; $I<$MaxRandomized; $I++)
            {
                $Index = rand(0, strlen($Characters)-1);
                $FinalResult .= $Characters[$Index];
            }
            return $FinalResult;
        }

        function StoreGeneratedUrl($MaxRandomized, $Characters, $FinalResult, $Input)
        {
            //Check if the button is clicked
            //Take input filtered/validated value as paremeter and store it into the database
            //Call insert function from the model
            //Pass in Data from paremeter

            //if( $InputBtn ){
                $Functions = new Functions;
                $GeneratedSlug = $Functions->GenerateUrlSlug($MaxRandomized, $Characters, $FinalResult);
                
                $CRUD = new CRUD; 
                //take input on the InputValidation class
                $CRUD->InsertData($GeneratedSlug,$Input);
                return $GeneratedSlug;
            //}

        }

        function RedirectToMainUrl($UrlSlug)
        {
            $CRUD = new CRUD;
            $DbSlug = $CRUD->RetrieveSlug($UrlSlug);
            var_dump($DbSlug);
            if($UrlSlug === $DbSlug["SlugGenerated"]){header("Location: ".$DbSlug["OriginalUrl"]);}
        }
    }
?>