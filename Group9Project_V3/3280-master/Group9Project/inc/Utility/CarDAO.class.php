<?php

class CarDAO   {

    private static $db;

    static function init()  {
        //Initialize the internal PDO Agent
        self::$db = new PDOAgent("Car");   //class name        
    }    

    static function getCar($carId)  {
       $sql = "SELECT * FROM car WHERE carId = :carId";
       self::$db->query($sql);
       self::$db->bind(":carId", $carId); 
       self::$db->execute();
       //return the User object
       return self::$db->singleResult();
     
    }

    static function getCars() {
      $selectAll = "SELECT * FROM car";
      self::$db->query($selectAll);
      self::$db->execute();
      return self::$db->getResultSet(); 
  }

    //add
    static function createCar(Car $newCar) {

      // QUERY BIND EXECUTE RETURN
      $sqlInsert = "INSERT INTO car (carId,brand,model,price,date,availability)
                      VALUES (:carId,:brand,:model,:price,:date,:availability)";
      self::$db->query($sqlInsert);

      //bind
      self::$db->bind(':carId', $newCar->getCarId());
      self::$db->bind(':brand', $newCar->getBrand());
      self::$db->bind(':model', $newCar->getModel());
      self::$db->bind(':price', $newCar->getPrice());
      self::$db->bind(':date', $newCar->getDate());
      self::$db->bind(':availability', $newCar->getAvailability());

      // execute
      self::$db->execute();

      //return self::$db->lastInsertId();
      

  }

    // update    
    static function updateCar (Car $CarToUpdate) {

      //QUERY, BIND, EXECUTE
      $update = "UPDATE * FROM car
                 SET carId = $CarToUpdate->getCarId(),
                 brand = $CarToUpdate->getBrand(),
                 model = $CarToUpdate->getModel(),
                 price = $CarToUpdate->getPrice(),
                 date = $CarToUpdate->getDate(),
                 availability = $CarToUpdate->getAvailability(),
                 WHERE carId = $CarToUpdate->getCarId();";

      self::$db->query($update);
      self::$db->execute();
      
      // Return the rowCount
      return self::$db->singleResult(); 
  }

  // DELETE
  static function deleteCar($carId) {
    $sqlDelete = "DELETE FROM car WHERE carId = :carId";
    try{
        self::$db->query($sqlDelete);
        self::$db->bind(':carId',$carId);
        self::$db->execute();
        if(self::$db->rowCount() != 1){
            // we fail in deleting
            throw new Exception("Problem in deleting the car $carId");
        }
    }
    catch(Exception $e){
        echo $e->getMessage();
        //self::$db->debugDumpParams();
        return false;
    }

    return true;   

}


    
    
    
}