<?php
    namespace Controller;
    require('../vendor/autoload.php');
    use Model\CRUD;

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

        function StoreGeneratedUrl($Slug)
        {
            
            $Input = $_REQUEST["UrlInput"];
            $InputBtn = $_REQUEST["GenerateUrlBtn"];

            //Check if the button is clicked
            //Take input filtered/validated value as paremeter and store it into the database
            //Call insert function from the model
            //Pass in Data from paremeter
            if($InputBtn){
                $CRUD = new CRUD;
                $CRUD->InsertData($Slug,$Input);
            }

        }

        function RedirectToMainUrl($UrlSlug)
        {
            $CRUD = new CRUD;
            $DbSlug = $CRUD->RetrieveSlug($UrlSlug);
            var_dump($DbSlug["SlugGenerated"]);
            if($UrlSlug === $DbSlug["SlugGenerated"])
            {
                header("Location: ".$DbSlug["OriginalUrl"]);
            }
        }
    }
?>