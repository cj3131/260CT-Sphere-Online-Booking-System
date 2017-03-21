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

$sql = "SELECT * FROM staff";
$result = $conn->query($sql);

$array_ret = Array();

if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
        array_push($array_ret,$row);
    }
}

echo json_encode($array_ret);

$conn->close();
?>