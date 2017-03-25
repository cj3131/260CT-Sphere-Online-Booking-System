<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sphere Booking System</title>
<link href="css/newstyles.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="header-wrap">
	<div class="logo">
		<h1>Sphere Skiing</h1>
    </div>
</div><!---header-wrap-End-->

<div class="menu-wrap">
	<div class="menu">
		<ul>
        	<li><a href="home.html">Home</a></li>
            <li><a href="booking.php">Book</a></li>
            <li><a href="register.php">Register</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="login.php" class="active">Log In</a></li>
            <li><a href="updatedetails.html">Account</a></li>
        </ul>
    </div>
    
    <div class="socia-wrap">
	<div class="socail">
		<ul>
        	<li><a href="#"><img src="images/aim.png" alt="" /></a></li>
        	<li><a href="#"><img src="images/facebook.png" alt="" /></a></li>
            <li><a href="#"><img src="images/twwtter.png" alt="" /></a></li>
            <li><a href="#"><img src="images/linkedin.png" alt="" /></a></li>
		</ul>
	</div>
</div>
</div><!---menu-wrap-End-->

<div class="page-wrap">
<div class="wrap3">  
  <div class="leftcol">
  <div class="panel">
  	<div class="title">
  		<h1>Log In</h1>
        <span>Log in here.</span>
    </div>
      <div class="panel">
      
      
      <form method="post" action="login.php">
          <div class="contact-form mar-top30">
            <div>
              
                  <label><span>Email</span>
                  <input type="text" name="email" placeholder="email@email.com" class="input_text"/></label>
             
              
                  <label><span>Password</span>
                  <input class="input_text" type="password" name="password"/></label>
              
                  <input class="button" type="submit" value="Login">
              <p style="color:red">
              <label>ERROR - Wrong password or email</label>
              </p>
          </div>

        <a href="customer_page.html" title="Customer page">Customer page</a> <br />
        <a href="staff_page.html" title="Staff page">Staff page</a>


          </div>
        </form>
        <div class="clearing"></div>
      </div>
  </div>	
  </div>
  
  <div class="rightcol">
  	<div class="panel">
  		<div class="title"><h1>Please note that some sessions may be unavailable<br><br><br> </h1></div>
    	<div class="content">
        	<div class="icon"><img src="images/icon5.png" alt="icon" /></div>
            <spna>Sessions last minimum one hour </spna>
            <p>however you may book as many hours as you like, up until 4pm.</p>
        </div>
        <div class="content marTop40">
        	<div class="icon"><img src="images/icon5.png" alt="icon" /></div>
            <spna>Book online or in person</spna>
            <p>at our resort reception. We cannot guarantee availability on last minute sessions.</p>
        </div>
        <div class="content marTop40">
        	<div class="icon"><img src="images/icon5.png" alt="icon" /></div>
            <spna>Member Discounts</spna>
            <p>are available for loyal members.</p>
            <div class="button marTop30"><a href="#">More Info</a></div>
        </div>
    </div>
  	<div class="panel marTop40">
  		<div class="title"><h1>Snowboarding coming soon!<br />Keep an eye out for updates.</h1></div>
    	<div class="content">
        	<p>Don't miss out on our great deals.</p>
            <ul>
            	<li><a href="#">- Learn more about our facilities</a></li>
                <li><a href="#">- Skiing lessons available</a></li>
                <li><a href="#">- On site refreshments</a></li>
                <li><a href="#">- Membership information</a></li>
                <li class="bg-bottom"><a href="#">- The location</a></li>
            </ul>
            <div class="button marTop30"><a href="#">More Info</a></div>
        </div>
    </div>
  </div>  
    
  <div class="clearing"></div>
</div>    
</div><!---page-wrap-End-->
<div class="footer-wrap">
  <div class="wrap">
    <div class="panel marRight30">
      <div class="title">
        <h1>Testimonial</h1>
      </div>
      <div class="content">
        <div class="testimonials"> This place is incredible. I've never enjoyed skiing quite like this.</div>
        <span>- Famous Celebrity</span> </div>
    </div>
    <div class="panel marRight30">
      <div class="title">
        <h1>Newsletter</h1>
      </div>
      <div class="content">
        <ul>
          <li>
            <input name="input" type="text"  class="input-newsletter"/>
          </li>
          <li>
            <input type="button" class="button" value="Signup" />
          </li>
        </ul>
        <p>Sign up to be part of our mailing system and receive the latest news and offers</p>
        <span><a href="#">Unsubscribe</a></span> </div>
    </div>
    <div class="panel">
      <div class="title">
        <h1>Contact us </h1>
      </div>
      <div class="cotact">
        <ul>
          <li><img src="images/icon6.png" alt="" />123456789</li>
          <li><img src="images/icon7.png" alt="" /><a href="mailto:patrickjohnson0605@gmail.com">patrickjohnson0605@gmail.com</a></li>
          <li><img src="images/icon8.png" alt="" />260CT Software Engineering</li>
        </ul>
      </div>
    </div>
    <div class="clearing"></div>
  </div>
</div><!---footer-wrap-->
<div class="clearing"></div>
<div class="copyright-wrap">
	<div class="wrap">
    	<div class="content">
        <p>Copyright (c) SphereTrix. All rights reserved.</p>
        </div>
	</div>
</div><!---copyright-wrap-End-->
</body>
</html>
