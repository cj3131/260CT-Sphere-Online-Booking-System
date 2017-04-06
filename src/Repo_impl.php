<?php
    

public class DataRepoImpl implements DataRepo{

    public void AddUser($userFactory){
        $fisrt_name = $userFactory->getFirstName;
        $surname = $userFactory->getLastName;
        $email = $userFactory->getEmail;
        $phone_number = $userFactory->getPhoneNumber;
        $dob = $userFactory->getDoB;
        $password = $userFactory->getPassword;
        $customer_address_one = $userFactory->getAddLine1;
        $customer_address_two = $userFactory->getAddLine2;
        $city = $userFactory->getCity;
        $county = $userFactory->getCounty;
        $postcode = $userFactory->getPostcode;
        //Gets all the data in the class by calling the get functions

        write($fisrt_name,$surname,$email,$phone_number,$dob,$password,$customer_address_one,$customer_address_two,$city,$county,$postcode);
        //Calls the write function to write the data to the database
    }

    public write($fisrt_name,$surname,$email,$phone_number,$dob,$password,$customer_address_one,$customer_address_two,$city,$county,$postcode){
        connectDB();
        $sql = "INSERT INTO members (first_name, last_name, email, phone_number, dob, address_one, address_two, city, country, postcode, password)
            VALUES ('{$firstname}','{$surname}','{$email}','{$phonenumber}','{$dob}','{$customer_address_one}','{$customer_address_two}','{$city}',
            '{$county}','{$postcode}','{$password}')";
        //Adds data into the database 

        if ($this->conn->query($sql) === FALSE)
            //checks to see if the command was commited 
        {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
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

}

?>

