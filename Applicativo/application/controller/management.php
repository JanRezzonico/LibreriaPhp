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
            if(isset($_POST["copies"]) && !empty($_POST["copies"])){
                $copies = $this->testInput($_POST["copies"]);
            }else{
                $error = "Please insert all values";
                require 'application/views/templates/header.php';
                require 'application/views/management/bookcreation.php';
                require 'application/views/templates/footer.php';
                return;
            }
            if(isset($_POST["authors"]) && !empty($_POST["authors"])){
                $author_id  = $this->testInput($_POST["authors"]);
                if($author_id == -1){
                    if(isset($_POST["author-name"]) && !empty($_POST["author-name"])){
                        $author_name = $this->testInput($_POST["author-name"]);
                    }else{
                        $error = "Please insert author values or select an existing author";
                        require 'application/views/templates/header.php';
                        require 'application/views/management/bookcreation.php';
                        require 'application/views/templates/footer.php';
                        return;
                    }
                    if(isset($_POST["author-surname"]) && !empty($_POST["author-surname"])){
                        $author_surname = $this->testInput($_POST["author-surname"]);
                    }else{
                        $error = "Please insert author values or select an existing author";
                        require 'application/views/templates/header.php';
                        require 'application/views/management/bookcreation.php';
                        require 'application/views/templates/footer.php';
                        return;
                    }
                    if(isset($_POST["author-year"]) && !empty($_POST["author-year"])){
                        $author_year = $this->testInput($_POST["author-year"]);
                    }else{
                        $error = "Please insert author values or select an existing author";
                        require 'application/views/templates/header.php';
                        require 'application/views/management/bookcreation.php';
                        require 'application/views/templates/footer.php';
                        return;
                    }


                }else{
                    require 'application/models/author.php';
                    $author = Author::getAuthor($author_id);
                }
            }else{
                $error = "Please insert all values";
                require 'application/views/templates/header.php';
                require 'application/views/management/bookcreation.php';
                require 'application/views/templates/footer.php';
                return;
            }
            if(isset($_POST["publishers"]) && !empty($_POST["publishers"])){
                $publisher_id  = $this->testInput($_POST["publishers"]);
                if($publisher_id == -1){
                    if(isset($_POST["publisher-name"]) && !empty($_POST["publisher-name"])){
                        $publisher_name = $this->testInput($_POST["publisher-name"]);
                    }else{
                        $error = "Please insert author values or select an existing publisher";
                        require 'application/views/templates/header.php';
                        require 'application/views/management/bookcreation.php';
                        require 'application/views/templates/footer.php';
                        return;
                    }
                    if(isset($_POST["publisher-country"]) && !empty($_POST["publisher-country"])){
                        $publisher_country = $this->testInput($_POST["publisher-country"]);
                    }else{
                        $error = "Please insert author values or select an existing publisher";
                        require 'application/views/templates/header.php';
                        require 'application/views/management/bookcreation.php';
                        require 'application/views/templates/footer.php';
                        return;
                    }
                    if(isset($_POST["publisher-year"]) && !empty($_POST["publisher-year"])){
                        $publisher_year = $this->testInput($_POST["publisher-year"]);
                    }else{
                        $error = "Please insert author values or select an existing publisher";
                        require 'application/views/templates/header.php';
                        require 'application/views/management/bookcreation.php';
                        require 'application/views/templates/footer.php';
                        return;
                    }


                }else{
                    require 'application/models/publisher.php';
                    $publisher = Publisher::getPublisher($publisher_id);
                }
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