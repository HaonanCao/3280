<?php

class Booking{

    private $bookingId = "";
    private $userId = "";
    private $carId = "";

    // Getters
    function getBookingId() : INT{
        return $this->bookingId;
    }

    function getUserId() : string{
        return $this->userId;
    }

    function getCarId() : string{
        return $this->carId;
    }

    function setBookingId($bookingId){
        $this->bookingId = $bookingId;
    }
    function setUserId($userId){
        $this->userId = $userId;
    }
    function setCarId($carId){
        $this->carId = $carId;
    }

   


}


?>