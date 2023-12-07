<?php

class management
{
    public function index(){
        require 'application/models/book.php';
        $authors = Book::fetchAuthors();
        $publisher = Book::fetchPublishers();

        require 'application/views/templates/header.php';
        require 'application/views/management/bookcreation.php';
        require 'application/views/templates/footer.php';
    }
}