<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sphere1_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

echo "test 1";
/*
$firstname = $_POST["customer_firstname"];
$surname = $_POST["customer_surname"];
$email = $_POST["email_address"];
$phonenumber = $_POST["phone_number"];
$dob = $_POST["dob"];
$password = $_POST["password"];
$customer_address_one = $_POST["customer_address1"];
$customer_address_two = $_POST["customer_address2"];
$city = $_POST["customer_city"];
$county = $_POST["customer_county"];
$postcode = $_POST["customer_postcode"];

echo "test 2";

$sql = "INSERT INTO members (first_name, last_name, email, phone_number, dob, address_one, address_two, city, country, postcode, password)
VALUES ('{$firstname}','{$surname}','{$email}','{$phonenumber}','{$dob}','{$customer_address_one}','{$customer_address_two}','{$city}',
'{$county}','{$postcode}','{$password}')"; 

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

*/


$sql = "SELECT * FROM members";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo " - Name: " . $row["user_id"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

?>
