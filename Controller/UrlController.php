<?php
    namespace Controller;

    error_reporting(1);
    session_start();
    
    use Model\CRUD;

    class UrlController
    {
        /**
         * Generating max string of 7 digits
         * 
         * @param int $MaxRandomized
         * @param string $Characters
         */
        private function GenerateUrlSlug($MaxRandomized, $Characters): string
        {
            $FinalResult = '';
            for($I=0; $I<$MaxRandomized; $I++)
            {
                $Index = rand(0, strlen($Characters)-1);
                $FinalResult .= $Characters[$Index];
            }
            return $FinalResult;
        }


        /**
         * This method takes the slug generated and stores it in the data base
         * 
         * @param int $MaxRandomized
         * @param string $Characters
         * @param string Make sure to filter this input since it's coming from the user
         * @return string Returns the string that was created in the GenerateUrlSlug()
         */
        public function StoreGeneratedUrl($MaxRandomized, $Characters, $Input): string
        {
            $GeneratedSlug = $this->GenerateUrlSlug($MaxRandomized, $Characters);
            
            $CRUD = new CRUD; 
            //take input on the InputValidation class
            $CRUD->InsertData($GeneratedSlug,$Input);
            return $GeneratedSlug;
        }

        
        /**
         * @param string $UrlSlug
         */
        public static function RedirectToMainUrl($UrlSlug): void
        {
            $CRUD = new CRUD;
            $DbSlug = $CRUD->RetrieveSlug($UrlSlug);

            if($UrlSlug === $DbSlug["SlugGenerated"]) header("Location: ".$DbSlug["OriginalUrl"]);
        }
    }
?>