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

$firstname = $_POST["first_name"];
$surname = $_POST["surname"];
$email = $_POST["email"];
$phonenumber = $_POST["phoneNum"];
$dob = $_POST["DoB"];
$password = $_POST["password"];
$customer_address_one = $_POST["addLine1"];
$customer_address_two = $_POST["addLine2"];
$city = $_POST["city"];
$county = $_POST["county"];
$postcode = $_POST["postcode"];

echo "$firstname";

$sql = "INSERT INTO members (first_name, last_name, email, phone_number, dob, address_one, address_two, city, country, postcode, password)
VALUES ('{$firstname}','{$surname}','{$email}','{$phonenumber}','{$dob}','{$customer_address_one}','{$customer_address_two}','{$city}',
'{$county}','{$postcode}','{$password}')"; 

if ($conn->query($sql) === TRUE) {
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();

?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/StyleSheet.css">
        <title>Online Booking System</title>
        <style>
        * {
            box-sizing: border-box;
        }
        .left {
            width: 35%;
            float: left;
            text-align: right;
        }
        .right {
            width: 35%;
            margin-left: 5%;
            float: left;
            text-align: right;
        }
        </style>
    </head>
    <body>
        <ul class="navH">
            <li><a href="home.html" title="home">Home</a></li>
            <li><a href="booking.php" title="booking">Booking</a></li>
            <li class="active"><a href="register.html" title="register">Register</a></li>
            <li><a href="login.html" title="login">Log in</a></li>
            <li><a href="updatedetails.html" title="update">Update Details</a></li>
        </ul>
    
        <form method="post">
            
            <div class= "title">
                <h1>Register</h1>
            </div>
            
  
                <p><label>Well done you have registered you can now login</label>
            
            </form>
        
        <footer>
            <a href="contact.html">Contact us</a> <a href="https://www.paypal.me/CallumHuntington">Send us money</a> <a href="about.html">About</a>
        </footer>
            
    </body>
</html>