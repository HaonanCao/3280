<?php

class car{

    private $carId = 0;
    private $brand = "";
    private $model = "";
    private $price = 0;
    private $date = "";
    private $availability = "";
    
    


    // Getters
    function getCarId(): INT {
        return $this->carId;
    }

    function getBrand() : string{
        return $this->brand;
    }

    function getModel() : string{
        return $this->model;
    }

    function getPrice() : string{
        return $this->price;
    }

    function getDate() : String{
        return $this->date;
    }

    function getAvailability() : string{
        return $this->availability;
    }


    function setCarId($carId){
        $this->carId = $carId;
    }
    function setBrand($brand){
        $this->brand = $brand;
    }
    function setModel($model){
        $this->model = $model;
    }
    function setPrice($price){
        $this->price = $price;
    }

    function setDate($date){
        $this->date = $date;
    }

    function setAvailability($availability){
        $this->availability = $availability;
    }


   


}


?>