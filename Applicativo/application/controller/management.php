<?php

class management
{
    public function index(){
        require 'application/views/templates/header.php';
        require 'application/views/management/index.php';
        require 'application/views/templates/footer.php';
    }
}