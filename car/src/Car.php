<?php

//this file is class declaration only!!!!!
class Car {

    private $make_model;
    private $price;
    private $miles;

    function __construct($make_model, $price, $miles)
    {
        $this->make_model = $make_model;
        $this->price = $price;
        $this->miles = $miles;
    }

    function worthBuying($max_price)
    {
        return $this->price < ($max_price + 100);
    }

    function setModel($new_model)
    {
        $this->make_model = (string) $new_model;
    }
    function getModel()
    {
        return $this->make_model;
    }
    function setPrice($new_price)
    {
        $this->price = (float) $new_price;
    //possibly add if statement to ensure its a number

    }
    function getPrice()
    {
        return $this->price;
    }
    function setMiles($new_miles)
    {
        $this->miles = (float) $new_miles;
    //possibly add if here as well
    }
    function getMiles()
    {
        return $this->miles;
    }
    function save()
    {
        array_push($_SESSION['list_of_cars'], $this);
    }
    static function getAll()
    {
        return $_SESSION['list_of_cars'];
    }
    static function deleteAll()
    {
        $_SESSION['list_of_cars'] = array();
    }
}

?>
