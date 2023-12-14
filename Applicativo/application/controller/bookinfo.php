<?php

class BookInfo
{
    public function index($id)
    {
        session_start();
        if(!$_SESSION['logged']){
            header("Location: " . URL . "login");
            exit();
        }
        require 'application/models/book.php';
        $book = Book::getBook($id);
        require 'application/views/templates/header.php';
        require 'application/views/dashboard/nav.php';
        require 'application/views/book/index.php';
        require 'application/views/templates/footer.php';
    }
}