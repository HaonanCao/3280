<?php

class UserDAO   {

    private static $db;

    static function init()  {
        //Initialize the internal PDO Agent
        self::$db = new PDOAgent("User");   //class name        
    }    

    static function getUser($userId)  {
       $sql = "SELECT * FROM user WHERE userId = :userId";
       self::$db->query($sql);
       self::$db->bind(":userId", $userId); 
       self::$db->execute();
       //return the User object
       return self::$db->singleResult();
     
    }

    static function getUsers() {
      $selectAll = "SELECT * FROM user";
      self::$db->query($selectAll);
      self::$db->execute();
      return self::$db->getResultSet(); 
  }

   

    // update    
    static function updateCar (User $UserToUpdate) {

      //QUERY, BIND, EXECUTE
      $update = "UPDATE * FROM user
                 SET userId = $UserToUpdate->getUserId(),
                 firstName = $UserToUpdate->getFirstName(),
                 lastName = $UserToUpdate->getLastName(),
                 password = $UserToUpdate->getPassword()
                 WHERE userId = $UserToUpdate->getUserId();";

      self::$db->query($update);
      self::$db->execute();
      
      // Return the rowCount
      return self::$db->singleResult(); 
  }

  // DELETE
  static function deleteUser($userId) {
    $sqlDelete = "DELETE FROM user WHERE userId = :userId";
    try{
        self::$db->query($sqlDelete);
        self::$db->bind(':userId',$userId);
        self::$db->execute();
        if(self::$db->rowCount() != 1){
            // we fail in deleting
            throw new Exception("Problem in deleting the user $userId");
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