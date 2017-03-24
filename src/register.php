<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sphere Booking System</title>

  <style>
                table
        {
            table-layout: fixed;
            width: 550px;
        }
        * {
            box-sizing: border-box;
        }
        .error {color: #FF0000;}
            
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
<link href="css/newstyles.css" rel="stylesheet" type="text/css" />
</head>
<body>
            <?php
            // define variables and set to empty values
            $first_nameErr = "";
            $first_name = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
              if (empty($_POST["first_name"])) {
                $first_nameErr = "Name is required";
              } else {
                $first_name = test_input($_POST["first_name"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) {
                  $first_nameErr = "Only letters and white space allowed"; 
                }
              }
            }
            function test_input($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
}
        ?>
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
            <li><a href="register.php" class="active">Register</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="login.php">Log In</a></li>
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
  		<h1>Customer Registration</h1>
        <span>You will need to be signed up to our system before you can ski with us. Please begin by providing us your personal details.</span>
    </div>
      <div class="panel">
      
      
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <div class="contact-form mar-top30">

            <label> <span>First Name<?php echo $first_nameErr; ?></span>
            <input type="text" class="input_text" name="first_name">
            </label>

            <label> <span>Surname</span>
            <input type="text" class="input_text" name="customer_surname">
            </label>

            <label> <span>Date of Birth</span>
            <input id="DoB" type="date" class="input_text" name="dob">
            </label>

            <div class="title">
            <h1></br>Contact details</h1>
            <span>Enter your contact details below. We will never sell your details to third parties and will only use these details to contact you with offers or to confirm bookings.</span></div>

            <label> <span>Email Address</span>
            <input type="email" class="input_text" name="email_address">
            </label>

            <label> <span>Phone Number</span>
            <input type="number" class="input_text" name="phone_number">
            </label>

            <div class="title">
            <h1></br>Enter a password</h1>
            <span>Please select a password. It must be at least 6 characters and contain at least one letter and number.</span></div>

            <label> <span>New Password</span>
            <input type="password" class="input_text" name="password">
            </label>

            <label> <span>Confirm New Password</span>
            <input type="password" class="input_text" name="confirm_password">
            </label>

            <input type="button" class="button" value="Register" />
            
            </div>

        </form>
        <div class="clearing"></div>
      </div>
  </div>	
  </div>
  
  <div class="rightcol">
  	<div class="panel">
  		<div class="title"><h1>You will be eligible for loyalty discounts after registration.<br><br><br> </h1></div>
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
  <div class="wrap" style="padding-bottom:250px;">
    <div class="panel marRight30">
      <div class="title">
        <h1>Testimonial</h1>
      </div>
      <div class="content">
        <div class="testimonials" style="width:300px; height:158px;"> This place is incredible. I've never enjoyed skiing quite like this.</div>
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
    	<div class="content" >
        <p>Copyright (c) SphereTrix. All rights reserved.</p>
        </div>
	</div>
</div><!---copyright-wrap-End-->
</body>
</html>
