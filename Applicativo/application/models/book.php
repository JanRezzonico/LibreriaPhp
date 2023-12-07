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
    public static function getAuthor($id){
        $statement = 'SELECT * FROM author WHERE id = :id;';
        $result = DB_CONNECTION->prepare($statement);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $author = $result->fetch(PDO::FETCH_OBJ);

        return $author;
    }
    public static function fetchAuthors(){
        $statement = 'SELECT * FROM author;';
        $result = DB_CONNECTION->prepare($statement);
        $result->execute();
        $authors = $result->fetch(PDO::FETCH_OBJ);

        return $authors;
    }
    public static function createAuthor(){

    }
    public static function getPublisher($id){
        $statement = 'SELECT * FROM publisher WHERE id = :id;';
        $result = DB_CONNECTION->prepare($statement);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $publisher = $result->fetch(PDO::FETCH_OBJ);

        return $publisher;
    }
    public static function fetchPublishers(){
        $statement = 'SELECT * FROM publisher;';
        $result = DB_CONNECTION->prepare($statement);
        $result->execute();
        $publishers = $result->fetch(PDO::FETCH_OBJ);

        return $publishers;
    }
    public static function createPublisher(){

    }
}