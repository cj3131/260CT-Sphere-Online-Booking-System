

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sphere4_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$date = $_POST["date"];
$time = $_POST["time"];

$attendees = $_POST["attendees"];
$experience = $_POST["experience"];
$comments = $_POST["comments"];
$equipment = $_POST["equipment"];




$sql = "SELECT * FROM sessions WHERE date = '{$date}' AND time = '{$time}'";
$result = $conn->query($sql);		

if ($result->num_rows > 0) {		
    // output data of each row		
    while($row = $result->fetch_assoc()) {
        $session_id = $row["session_id"];
    }		
}
else{
        $sql = "INSERT INTO sessions (date, time) VALUES ('{$date}','{$time}')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
    $sql = "SELECT * FROM sessions WHERE date = '{$date}' AND time = '{$time}'";
$result = $conn->query($sql);		

if ($result->num_rows > 0) {		
    // output data of each row		
    while($row = $result->fetch_assoc()) {
        $session_id = $row["session_id"];
    }		
}
    }


$sql = "INSERT INTO groups (session_id, attendees, experience, equipment) VALUES ('{$session_id}','{$attendees}','{$experience}','{$equipment}')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";

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
            <li><a href="booking.html" title="booking">Booking</a></li>
            <li class="active"><a href="register.html" title="register">Register</a></li>
            <li><a href="login.html" title="login">Log in</a></li>
            <li><a href="updatedetails.html" title="update">Update Details</a></li>
        </ul>
    
        <form method="post">
            
            <div class= "title">
                <h1>Register</h1>
            </div>
            
  
                <p><label>Session has been successfully booked</label>
            
            </form>
        
        <footer>
            <a href="contact.html">Contact us</a> <a href="https://www.paypal.me/CallumHuntington">Send us money</a> <a href="about.html">About</a>
        </footer>
            
    </body>
</html>