<?php

require("RegisterGoF.php");

class user_controller
{  
    // --- CONSTRUCTOR ---

    function __construct()
    {
        $this->userFactory = new UserFactory();
    }

    // --- PUBLIC ---

    public function insertDB() // VALIDATE POST
    {
        $pData = $_POST["data"];

        $firstname = $pData["first_name"];
        $surname = $pData["surname"];
        $email = $pData["email"];
        $phonenumber = $pData["phoneNum"];
        $dob = $pData["DoB"];
        $password = $pData["password"];
        $customer_address_one = $pData["addLine1"];
        $customer_address_two = $pData["addLine2"];
        $city = $pData["city"];
        $county = $pData["county"];
        $postcode = $pData["postcode"];

        $this->userFactory->AddUser($firstname,$surname,$email,$phonenumber,$dob,$password,$customer_address_one,$customer_address_two,$city,$county,$postcode);

    }

}
$cont = new user_controller();
$cont->insertDB();
?>
