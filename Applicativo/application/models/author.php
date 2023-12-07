<?php

class Author
{
    private $id;
    private $name;
    private $surname;
    private $year;

    public function __construct($obj)
    {
        $this->id = $obj->id;
        $this->name = $obj->name;
        $this->surname = $obj->surname;
        $this->year = $obj->birth_year;
    }

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    public function getFullName(){
        return $this->name." ".$this->surname;
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
        $authors = $result->fetchAll(PDO::FETCH_OBJ);

        $all = array();

        foreach ($authors as $a){
            $all[] = new Author($a);
        }

        return $all;
    }
    public static function createAuthor(){

    }
}