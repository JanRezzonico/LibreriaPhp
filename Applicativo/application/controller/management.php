<?php

class Management
{
    public function index(){
        require 'application/views/templates/header.php';
        require 'application/views/management/index.php';
        require 'application/views/templates/footer.php';
    }

    public function create(){
        require 'application/models/author.php';
        require 'application/models/publisher.php';
        $authors = Author::fetchAuthors();
        $publisher = Publisher::fetchPublishers();

        require 'application/views/templates/header.php';
        require 'application/views/management/bookcreation.php';
        require 'application/views/templates/footer.php';
    }

    public function createBook(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST["title"]) && !empty($_POST["title"])){
                $title = $this->testInput($_POST["title"]);
            }else{
                $error = "Please insert all values";
                require 'application/views/templates/header.php';
                require 'application/views/management/bookcreation.php';
                require 'application/views/templates/footer.php';
                return;
            }
            if(isset($_POST["summary"]) && !empty($_POST["summary"])){
                $summary = $this->testInput($_POST["summary"]);
            }else{
                $error = "Please insert all values";
                require 'application/views/templates/header.php';
                require 'application/views/management/bookcreation.php';
                require 'application/views/templates/footer.php';
                return;
            }
            if(isset($_POST["isbn"]) && !empty($_POST["isbn"])){
                $isbn = $this->testInput($_POST["isbn"]);
            }else{
                $error = "Please insert all values";
                require 'application/views/templates/header.php';
                require 'application/views/management/bookcreation.php';
                require 'application/views/templates/footer.php';
                return;
            }
            if(isset($_POST["release-year"]) && !empty($_POST["release-year"])){
                $releaseYear = $this->testInput($_POST["release-year"]);
            }else{
                $error = "Please insert all values";
                require 'application/views/templates/header.php';
                require 'application/views/management/bookcreation.php';
                require 'application/views/templates/footer.php';
                return;
            }
            if(isset($_POST["price"]) && !empty($_POST["price"])){
                $price = $this->testInput($_POST["price"]);
            }else{
                $error = "Please insert all values";
                require 'application/views/templates/header.php';
                require 'application/views/management/bookcreation.php';
                require 'application/views/templates/footer.php';
                return;
            }

            $created = "All OK";
            require 'application/views/templates/header.php';
            require 'application/views/management/bookcreation.php';
            require 'application/views/templates/footer.php';
        }
    }

    private function testInput($value){
        $value = trim($value);
        $value = stripcslashes($value);
        $value = htmlspecialchars($value);
        return $value;
    }
}