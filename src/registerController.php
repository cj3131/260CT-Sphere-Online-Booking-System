<?php

require("RegisterGoF.php");
require("DataRepo.php");
require("Repo_impl.php");


class user_controller
{  
    private userFactory;
    
    // --- CONSTRUCTOR ---
    
    function __construct()
        '''Runs when a new object of the class is created'''
    {
        $this->userFactory = new UserFactory("free"); //Creates new object in the user factory
        $this->DataRepo UserRepo = new DataRepoImpl;  //Connects the DataRepo to a new DataRepoImpl class
    }

    // --- PUBLIC ---

    public function insertDB() // VALIDATE POST
    {
        
        $pData = $_POST;

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
        
        //gets all inputs from the the User Interface
        
        userFactory->setFirstName($firstname);
        userFactory->setLastName($surname);
        userFactory->setEmail($email);
        userFactory->setPhoneNumber($phonenumber);
        userFactory->setDoB($dob);
        userFactory->setpasssword($password);
        userFactory->setAddLine1($customer_address_one);
        userFactory->setAddLine2($customer_address_two);
        userFactory->setCity($city);
        userFactory->setCounty($county);
        userFactory->setPostcode($postcode);
        
        //Sets inputted data into the user class 
        
        this->UserRepo->AddUser(this->userFactory);
        //sends data to the Repo_impl class to save to the database 
       
        header("Location:registerSucc.html");
        //displays the next page
    }

}

$cont = new user_controller();
$cont->insertDB();
?>
