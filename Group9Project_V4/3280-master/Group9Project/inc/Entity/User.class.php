<?php

class User{

    private $userId = 0;
    private $firstName = "";
    private $lastName = "";
    private $password ="";

    // Getters
    function getUserId() : INT{
        return $this->userId;
    }

    function getFirstName() : string{
        return $this->firstName;
    }

    function getLastName() : string{
        return $this->lastName;
    }

    function getPassword() : string{
        return $this->password;
    }

    function setUserId($userId){
        $this->userId = $userId;
    }

    function setFirstName($firstName){
        $this->firstName = $firstName;
    }

    function setLastName($lastName){
        $this->lastName = $lastName;
    }

    function setPassword($password){
        $this->password = $password;
    }

    // verify the password
    function verifyPassword(string $pass){
        echo "pass:".$pass;
        echo "password:".$this->password;
        return password_verify($pass, $this->password);
    }


}


?>