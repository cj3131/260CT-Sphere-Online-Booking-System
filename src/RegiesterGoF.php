<?php

class UserFactory {
    private $context = "OReilly";  
    function makeUser($param) {
    $book = NULL;   
        switch ($param) {
            case "free":
                $user = new FreeUserMember;
            break;
            case "loyalty":
                $user = new LoyaltyMember;
            break;
            default:
                $user = new FreeUserMember;
            break;        
        }     
    return $book;
    }
}

abstract class AbstractUser {
    $pData = $_POST["data"];
    
        private $firstname;
        private $surname;
        private $email;
        private $phonenumber;
        private $dob;
        private $password;
        private $customerAdd1;
        private $customerAdd2;
        private $city;
        private $county;
        private $postcode;
    
    function __construct() {
        
        $this->firstname = $pData["first_name"];
        $this->surname = $pData["surname"];
        $this->email = $pData["email"];
        $this->phonenumber = $pData["phoneNum"];
        $this->dob = $pData["DoB"];
        $this->password = $pData["password"];
        $this->customerAdd1 = $pData["addLine1"];
        $this->customerAdd2 = $pData["addLine2"];
        $this->city = $pData["city"];
        $this->county = $pData["county"];
        $this->postcode = $pData["postcode"];
    abstract function getname();
    abstract function getemail();
}

class FreeUserMember extends AbstractUser {
        
            
    }
    function getname() {return $this->firstname;}
    function get() {return $this->email;}
}

class LoyaltyMember extends AbstractUser {
  
    }
    function getname() {return $this->firstname;}
    function getTitle() {return $this->email;}
}

?>