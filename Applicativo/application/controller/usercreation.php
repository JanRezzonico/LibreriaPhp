<?php

class UserCreation{

    public function index(){
        require 'application/views/templates/header.php';
        require 'application/views/usercreation/index.php';
        require 'application/views/templates/footer.php';
    }

    public function create(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST["username"]) && !empty($_POST["username"])){
                $username = $this->testInput($_POST["username"]);
            }else{
                $error = "Please insert an username";
                require 'application/views/templates/header.php';
                require 'application/views/usercreation/index.php';
                require 'application/views/templates/footer.php';
                return;
            }

            if(isset($_POST["password"]) && !empty($_POST["password"]) &&
                isset($_POST["password-conf"]) && !empty($_POST["password-conf"])){
                if($_POST["password"] == $_POST["password-conf"]){
                    $password = $this->testInput($_POST["password"]);
                }else{
                    $error = "Please insert the same password";
                    require 'application/views/templates/header.php';
                    require 'application/views/usercreation/index.php';
                    require 'application/views/templates/footer.php';
                    return;
                }
            }else{
                $error = "Please insert the password two times";
                require 'application/views/templates/header.php';
                require 'application/views/usercreation/index.php';
                require 'application/views/templates/footer.php';
                return;
            }


        }
    }
    private function testInput($value){
        $value = trim($value);
        $value = stripcslashes($value);
        $value = htmlspecialchars($value);
        return $value;
    }

}