<?php
    namespace Model;
    require('../vendor/autoload.php');
    use Model\DataBase;


    class CRUD extends DataBase
    {
        function InsertData($SlugGenerated, $OriginalUrl)
        {
            $Connection = $this->Connect();
            $Data = [
                "SlugGenerated" => $SlugGenerated,
                "OriginalUrl" => $OriginalUrl
            ];
            $Insert = "INSERT INTO linkgenerated (SlugGenerated, OriginalUrl)
            VALUES (:SlugGenerated, :OriginalUrl)";
            header("Cache-Control: no-cache, must-revalidate, max-age=0");
            $PerpareInsert = $Connection->prepare($Insert);
            $PerpareInsert->execute($Data);
        }

        function RetrieveData(){

        }
    }
?>