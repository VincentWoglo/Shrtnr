<?php
    namespace Controller;

    use Controller\Controller;

    class App
    {
        public function main() : void
        {
            Controller::View('Index');
        }
    }
?>