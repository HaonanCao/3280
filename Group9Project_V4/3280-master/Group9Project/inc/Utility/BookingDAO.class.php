<?php

class BookingDAO   {

    private static $db;

    static function init()  {
        //Initialize the internal PDO Agent
        self::$db = new PDOAgent("Booking");   //class name (User.class)         
    }    

    static function getBooking( $bookingId)  {
       $sql = "SELECT * FROM booking WHERE bookingId = :bookingId";
       self::$db->query($sql);
       self::$db->bind(":bookingId", $bookingId); 
       self::$db->execute();
         //return the User object
       return self::$db->singleResult();
     
    }

    static function getBookings() {

      $selectAll = "SELECT * FROM booking;";

      self::$db->query($selectAll);
      self::$db->execute();
      return self::$db->getResultSet(); 
  }

    static function createBooking(Booking $newBooking) {

      // QUERY BIND EXECUTE RETURN
      $sqlInsert = "INSERT INTO booking (bookingId,userId,carId)
                      VALUES (:bookingId, :userId, :carId)";
      self::$db->query($sqlInsert);

      //bind
      self::$db->bind(':bookingId', $newBooking->getBookingId());
      self::$db->bind(':userId', $newBooking->getUserId());
      self::$db->bind(':carId', $newBooking->getCarId());

      // execute
      self::$db->execute();

      //return self::$db->lastInsertId();
      

  }

    // UPDATE means update    
    static function updateBooking (Booking $BookingToUpdate) {

      //QUERY, BIND, EXECUTE
      $update = "UPDATE * FROM booking
                 SET bookingId = $BookingToUpdate->getBookingId(),
                 userId = $BookingToUpdate->getUerId(),
                 carId = $BookingToUpdate->getCarId()
                 WHERE bookingId = $BookingToUpdate->getBookingId();";

      self::$db->query($update);
      self::$db->execute();
      
      // Return the rowCount
      return self::$db->singleResult(); 
  }

  // DELETE
  static function deleteBooking($BookingId) {

    // Yea...yea... it is a drill like the one before     
    //$sqlDelete = "DELETE FROM Feedback WHERE FeedbackID = ".$FeedbackId;
    $sqlDelete = "DELETE FROM booking WHERE bookingId = :bookingId";

    // careful with delete
    try{
        self::$db->query($sqlDelete);
        self::$db->bind(':bookingId',$BookingId);
        self::$db->execute();
        if(self::$db->rowCount() != 1){
            // we fail in deleting
            throw new Exception("Problem in deleting the booking $BookingId");
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