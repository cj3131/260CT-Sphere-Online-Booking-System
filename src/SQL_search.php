<?php
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


$sql = "SELECT * FROM members";		
$result = $conn->query($sql);		
  		  
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["user_id"]. " - Name: " . $row["first_name"]. " " . $row["last_name"]. " " . $row["email"]. " ". $row["address_one"]. " ". $row["dob"]. " ". $row["postcode"]. " ". $row["password"]. "<br>";
    } 
} else {
    echo "0 results";
}
$conn->close();
?>