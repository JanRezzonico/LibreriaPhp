<?php


class Login
{

    public function index()
    {
        require 'application/views/templates/header.php';
        require 'application/views/login/index.php';
        require 'application/views/templates/footer.php';
    }
    public function check()
    {
        $error = "";
        $username = $_POST['username'] ?? "";
        $pwd = $_POST['password'] ?? "";
        if(empty($username) || empty($pwd)){
            $error = "Please insert both username and password";
            require 'application/views/templates/header.php';
            require 'application/views/login/index.php';
            require 'application/views/templates/footer.php';
            return;
        }
        require 'application/libs/Helper.php';
        $username = Helper::sanitize($username);
        $pwd = Helper::sanitize($pwd);
        require 'application/models/user.php';
        try {
            $user = User::getUser($username, $pwd);
            var_dump($user);
        } catch (Exception $e) {
        }
    }
}
