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

$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT password, email FROM members  WHERE password = '{$password}' AND email = '{$email}'";		
$result = $conn->query($sql);		
  		  
if ($result->num_rows > 0) {		
    // output data of each row		
    while($row = $result->fetch_assoc()) {		
        header("location: home.html");	
    }		
		
}
$conn->close();
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/StyleSheet.css">
        <title>Logintitle</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <ul class="navH">
            <li><a href="home.html" title="home">Home</a></li>
            <li><a href="booking.html" title="booking">Booking</a></li>
            <li><a href="register.html" title="register">Register</a></li>
            <li class="active"><a href="login.html" title="login">Log in</a></li>
            <li><a href="updatedetails.html" title="update">Update Details</a></li>
        </ul>
        <h1> Log in! </h1>
        <hr>
        <form method="post" action="login.php">
        <div>
            <p>
                <label style="display: block">Email</label>
                <input type="text" name="email" placeholder="email@email.com" />
            </p>
            <p>
                <label style="display: block">Password</label>
                <input type="password" name="password" />
            </p>
            <input type="submit" value="Login">
            <p style="color:red">
            <label style="display: block" >ERROR - Wrong password or email</label>
            </p>
        </div>

        <a href="customer_page.html" title="Customer page">Customer page</a> <br />
        <a href="staff_page.html" title="Staff page">Staff page</a>
        <footer>
            <a href="contact.html">Contact us</a> <a href="https://www.paypal.me/CallumHuntington">Send us money</a> <a href="about.html">About</a>
        </footer>
        </form>
    </body>
</html>