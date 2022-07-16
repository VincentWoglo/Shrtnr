<?php
    namespace Model;
    include_once('C:\xampp\htdocs\Shrtnr\vendor\autoload.php');
    error_reporting(0);
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

        function RetrieveSlug($UrlSlug){
            $Connection = $this->Connect();
            $Select = $Connection->prepare("SELECT *
            FROM linkgenerated WHERE SlugGenerated = :UrlSlug");
            $Select->execute(["UrlSlug"=>$UrlSlug]);
            $Retrieve = $Select->fetch();
            return $Retrieve;
        }
    }
?>