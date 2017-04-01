<?php

    $cont = new emp_controller();
    $cont->insertDB();
class emp_controller
{
    // --- VARIABLES ---
    
    private $conn = 0;
    
    // --- CONSTRUCTOR/DESTRUCTOR ---
    
    function __construct()
    {
        $this->connect_DB();
    }
    
    function __destruct()
    {
        $this->close_DB();
    }
    
    // --- PUBLIC ---
    
    // --- PRIVATE ---
    
    private function connect_DB()
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
    
    private function close_DB()
    {
        $this->conn->close();
    }
  
/*
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sphere5_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
*/
    
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


        $sql = "INSERT INTO members (first_name, last_name, email, phone_number, dob, address_one, address_two, city, country, postcode, password)
VALUES ('{$firstname}','{$surname}','{$email}','{$phonenumber}','{$dob}','{$customer_address_one}','{$customer_address_two}','{$city}',
'{$county}','{$postcode}','{$password}')"; 
        if ($this->conn->query($sql) === FALSE) 
        {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }
    
}
    


?>
