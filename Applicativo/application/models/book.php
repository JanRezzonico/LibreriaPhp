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
        $this->id = $book->id;
        $this->title = $book->title;
        $this->summary = $book->summary;
        $this->releaseYear = $book->release_year;
        $this->isbn = $book->ISBN;
        $this->price = $book->price;
        $this->coverImage = $book->coverImage ?? "";
        $this->copies = $book->copies;
        $this->author = $book->author_name;
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
}