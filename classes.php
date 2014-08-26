<?php
class user{
    private $userName;
    private $password;
    private $firstName;
    private $lastName;
    
    function __construct($user,$pass,$fName,$lName) {
        $this->userName = $user;
        $this->password = $pass;
        $this->firstName = $fName;
        $this->lastName = $lName;
    }
    
    public function getUserName(){
        return $this->userName;
    }
    
    public function getPassword(){
        return $this->password;
    }
    
    public function getFirstName(){
        return $this->firstName;
    }
    
    public function getLastName(){
        return $this->lastName;
    }
}
?>
