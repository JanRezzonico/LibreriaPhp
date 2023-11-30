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
        return books;
    }
    public static function getAuthor($id){
        $statement = 'SELECT * FROM author WHERE id = :id;';
        $result = DB_CONNECTION->prepare($statement);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $author = $result->fetch(PDO::FETCH_OBJ);

        if (!$author) {
            throw new Exception();
        }
        return $author;
    }
    public static function getPublisher($id){
        $statement = 'SELECT * FROM publisher WHERE id = :id;';
        $result = DB_CONNECTION->prepare($statement);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $publisher = $result->fetch(PDO::FETCH_OBJ);

        if (!$publisher) {
            throw new Exception();
        }
        return $publisher;
    }
}