<?php

class Publisher
{
    private $id;
    private $name;
    private $country;
    private $year;

    public function __construct($obj)
    {
        $this->id = $obj->id;
        $this->name = $obj->name;
        $this->country = $obj->country;
        $this->year = $obj->foundation_year;
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
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }


    public static function getPublisher($id){
        $statement = 'SELECT * FROM publisher WHERE id = :id;';
        $result = DB_CONNECTION->prepare($statement);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $publishers = $result->fetchAll(PDO::FETCH_OBJ);

        $all = array();

        foreach ($publishers as $p){
            $all[] = new Publisher($p);
        }

        return $all;
    }
    public static function fetchPublishers(){
        $statement = 'SELECT * FROM publisher;';
        $result = DB_CONNECTION->prepare($statement);
        $result->execute();
        $publishers = $result->fetchAll(PDO::FETCH_OBJ);

        $all = array();

        foreach ($publishers as $p){
            $all[] = new Publisher($p);
        }

        return $all;
    }
    public static function createPublisher(){

    }
}