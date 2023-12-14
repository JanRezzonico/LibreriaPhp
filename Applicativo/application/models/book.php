<?php

class Book
{
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @return mixed
     */
    public function getReleaseYear()
    {
        return $this->releaseYear;
    }

    /**
     * @return mixed
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getCoverImage()
    {
        return $this->coverImage;
    }

    /**
     * @return mixed
     */
    public function getCopies()
    {
        return $this->copies;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return mixed
     */
    public function getPublisher()
    {
        return $this->publisher;
    }
    private $id;
    private $title;
    private $summary;
    private $releaseYear;
    private $isbn;
    private $price;
    private $coverImage;
    private $copies;
    private $author;
    private $publisher;
    public function __construct($book)
    {
        require_once 'application/models/author.php';
        require_once 'application/models/publisher.php';
        $this->id = $book->id;
        $this->title = $book->title;
        $this->summary = $book->summary;
        $this->releaseYear = $book->release_year;
        $this->isbn = $book->ISBN;
        $this->price = $book->price;
        $this->coverImage = $book->coverImage ?? "";
        $this->copies = $book->copies;
        $this->author = Author::getAuthor($book->author_id);
        $this->publisher = Publisher::getPublisher($book->publisher_id);
    }

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

    //modificare querys
    public static function fetchBooks(){
        $statement = 'SELECT book.*, CONCAT(author.name, " " ,author.surname) AS author_name FROM book JOIN author ON author_id = author.id;';
        $result = DB_CONNECTION->prepare($statement);
        $result->execute();
        $books = $result->fetchAll(PDO::FETCH_OBJ);

        if (!$books) {
            throw new Exception();
        }
        $bookArray = [];
        foreach ($books as $book){
            $bookArray[] = new Book($book);
        }

        return $bookArray;
    }
    public static function getBook($id){
        $statement = 'SELECT * FROM book WHERE id = :id;';
        $result = DB_CONNECTION->prepare($statement);
        $result->bindParam(":id", $id, PDO::PARAM_INT);
        $result->execute();
        $book = $result->fetch(PDO::FETCH_OBJ);
        $b = new Book($book);
        return $b;
    }
    public static function createBook($title, $summary, $year, $isbn, $price, $cover, $copies, $author_id, $publisher_id){
        $statement = 'INSERT INTO book (title, summary, release_year, ISBN, price, cover_image, copies, author_id, publisher_id) 
            VALUES (:title, :summary, :release_year, :ISBN, :price, :cover, :copies, :author_id, :publisher_id)';
        $result = DB_CONNECTION->prepare($statement);
        $result->bindParam(":title", $title, PDO::PARAM_STR);
        $result->bindParam(":summary", $summary, PDO::PARAM_STR);
        $result->bindParam(":release_year", $year, PDO::PARAM_INT);
        $result->bindParam(":ISBN", $isbn, PDO::PARAM_STR);
        $result->bindParam(":price", $price, PDO::PARAM_STR);
        $result->bindParam(":cover", $cover, PDO::PARAM_STR);
        $result->bindParam(":copies", $copies, PDO::PARAM_INT);
        $result->bindParam(":author_id", $author_id, PDO::PARAM_INT);
        $result->bindParam(":publisher_id", $publisher_id, PDO::PARAM_INT);
        $result->execute();


        $book_id = DB_CONNECTION->lastInsertId();
        var_dump($book_id);
        $book = self::getBook($book_id);

        return $book;
    }
}