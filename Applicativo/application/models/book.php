<?php

class book
{
    public static function decrementBook(){

    }
    public static function orderBook(){

    }
    public static function addBook(){

    }
    public static function removeBook(){

    }
    public static function editBook(){

    }
    public static function fetchBooks(){
        $statement = 'SELECT * FROM book;';
        $result = DB_CONNECTION->prepare($statement);
        $result->execute();
        $books = $result->fetch(PDO::FETCH_OBJ);

        if (!$books) {
            throw new Exception();
        }
        return $books;
    }
}