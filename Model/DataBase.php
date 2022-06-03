<?php

    namespace Model;
    use PDO;

    class DataBase
    {

        private $Host = "localhost";
        private $Password = "";
        private $Username = "root";
        protected $Connection;

        function __construct()
        {
            $this->Host;
            $this->Password;
            $this->Username;
        }
    
        function Connect()
        {
            try
            {
                $this->Connection = new PDO("mysql:host=$this->Host;dbname=learnture", $this->Username, $this->Password);
                $this->Connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->Connection;
            }
            catch (PDOException $error)
            {
                echo "Please check you connection" .$error->getMessage();
            }
        }
    }
?>