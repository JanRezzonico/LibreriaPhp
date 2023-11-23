<?php


class Home
{

    public function index()
    {
        require 'application/views/templates/header.php';
        require 'application/views/home.php';
        require 'application/views/templates/footer.php';
    }
}
