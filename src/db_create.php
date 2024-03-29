<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sphere7_db";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "CREATE DATABASE sphere7_db";

if ($conn->query($sql) === TRUE) {
    echo "Database created successfully  ";
} else {
    echo "Error creating database: " . $conn->error;
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "CREATE TABLE members (
user_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
first_name VARCHAR(30) NOT NULL,
last_name VARCHAR(30) NOT NULL,
email VARCHAR(30) NOT NULL,
phone_number INT(11),
dob DATE NOT NULL,
address_one VARCHAR(30) NOT NULL,
address_two VARCHAR(30),
city VARCHAR(30) NOT NULL,
country VARCHAR(30) NOT NULL,
postcode VARCHAR(10) NOT NULL,
password VARCHAR(20) NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Table members created successfully  ";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE sessions (
session_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
date DATE NOT NULL,
starttime INT(2) NOT NULL,
endtime INT(2) NOT NULL,
total_attendees INT(2)
)";
if ($conn->query($sql) === TRUE) {
    echo "Table sessions created successfully  ";
} else {
    echo "Error creating table: " . $conn->error;
}


$sql = "CREATE TABLE bookings (
bookings_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
attendees INT(2) NOT NULL,
user_id INT(6) UNSIGNED,
session_id INT(6) UNSIGNED,
experience VARCHAR(20),
equipment BOOLEAN,
instructor BOOLEAN,
CONSTRAINT bookings_session_id_fk FOREIGN KEY (session_id)
REFERENCES sessions(session_id),
CONSTRAINT bookings_user_id_fk FOREIGN KEY (user_id)
REFERENCES members(user_id)

)";
if ($conn->query($sql) === TRUE) {
    echo "Table bookings created successfully  ";
} else {
    echo "Error creating table: " . $conn->error;
}


$sql = "CREATE TABLE staff (
staff_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
first_name VARCHAR(30) NOT NULL,
last_name VARCHAR(30) NOT NULL,
role VARCHAR(30) NOT NULL,
salary INT(6) UNSIGNED NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Table staff created successfully  ";
} else {
    echo "Error creating table: " . $conn->error;
}


$conn->close();
?>