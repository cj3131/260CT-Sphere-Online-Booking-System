<?php

class UserFactory { 

    private $conn = 0;
    
    function __construct()
    {
        $this->ConnectDB();
    }
    function __destruct()
    {
        $this->DisconnectDB();
    }
    
    private function ConnectDB()
    {

        // Connection details
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sphere5_db";

        // Create connection
        $this->conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    private function DisconnectDB()
    {
        $this->conn->close();
    }

    function AddUser($firstname,$surname,$email,$phonenumber,$dob,$customer_address_one,$customer_address_two,$city,$county,$postcode,$password){
        
       
            $sql = "INSERT INTO members (first_name, last_name, email, phone_number, dob, address_one, address_two, city, country, postcode, password)
            VALUES ('{$firstname}','{$surname}','{$email}','{$phonenumber}','{$dob}','{$customer_address_one}','{$customer_address_two}','{$city}',
            '{$county}','{$postcode}','{$password}')";

            if ($this->conn->query($sql) === FALSE) 
            {
                echo "Error: " . $sql . "<br>" . $this->conn->error;
            }

       
        $user = NULL;   
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
        return $user;
    }
}

abstract class AbstractUser {

    protected $firstname;
    protected $surname;
    protected $email;
    protected $phonenumber;
    protected $dob;
    protected $password;
    protected $customerAdd1;
    protected $customerAdd2;
    protected $city;
    protected $county;
    protected $postcode;
    protected $discount;
    protected $fee;

    function __construct($firstname,$surname,$email,$phonenumber,$dob,$password,$customerAdd1,$customerAdd2,$city,$county,$postcode) {

        $this->firstname = $firstname;
        $this->surname = $surname;
        $this->email = $email;
        $this->phonenumber = $phonenumber;
        $this->dob = $dob;
        $this->password = $password;
        $this->customerAdd1 = $customerAdd1;
        $this->customerAdd2 = $customerAdd2;
        $this->city = $city;
        $this->county = $county;
        $this->postcode = $postcode;

    }

}


class FreeUserMember extends AbstractUser {

    function __construct($firstname,$surname,$email,$phonenumber,$dob,$password,$customerAdd1,$customerAdd2,$city,$county,$postcode) 
    {
        parent::__construct($ID,$fname,$lname);

        $this->discount = $this->CalcFreeMemberDiscount();
        $this->fee = $this->CalcFreeMemberFee();
    }

    function CalcFreeMemberFee(){
        return(0.00);
    }
    function CalcFreeMemberDiscount() {
        return(0.00);
    }
}

class LoyaltyMember extends AbstractUser {

    function __construct($firstname,$surname,$email,$phonenumber,$dob,$password,$customerAdd1,$customerAdd2,$city,$county,$postcode) 
    {
        parent::__construct($ID,$fname,$lname);

        $this->discount = $this->CalcLoyaltyMemberDiscount();
        $this->fee = $this->CalcLoyaltyMemberFee();
    }

    function CalcLoyaltyMemberFee(){
        return(0.00);
    }
    function CalcLoyaltyMemberDiscount(){
        return(0.00);
    }
}
?>