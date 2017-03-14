<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sphere_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

/*
$sql = "CREATE DATABASE sphere_db";

if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}
*/


$sql = "CREATE TABLE sessions (
session_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
date VARCHAR(30) NOT NULL,
time VARCHAR(30) NOT NULL,
group_id INT(6) UNSIGNED,
CONSTRAINT sess_group_id_fk FOREIGN KEY (group_id)
REFERENCES groups(group_id)
)";
if ($conn->query($sql) === TRUE) {
    echo "Table sessions created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}


$sql = "CREATE TABLE groups (
group_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
attendees INT(3) NOT NULL,
user_id INT(6) UNSIGNED,
CONSTRAINT group_user_id_fk FOREIGN KEY (user_id)
REFERENCES members(user_id)
)";
if ($conn->query($sql) === TRUE) {
    echo "Table groups created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}


$sql = "CREATE TABLE members (
user_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
first_name VARCHAR(30) NOT NULL,
last_name VARCHAR(30) NOT NULL,
email TIMESTAMP NOT NULL,
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
    echo "Table members created successfully";
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
    echo "Table staff created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}


$conn->close();
?>