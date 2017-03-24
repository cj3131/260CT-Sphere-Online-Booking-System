<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sphere Booking System</title>
<script type="text/javascript">
                function show_equipment(box) {

                var chboxs = document.getElementsByName("equipment");
                var vis = "none";
                for(var i=0;i<chboxs.length;i++) { 
                    if(chboxs[i].checked){
                     vis = "block";
                        break;
                    }
                }
                document.getElementById(box).style.display = vis;
                }
  </script>
  <style>
                table, th, td {
                    border: 1px solid black;
                    table-layout: fixed;
                }
  </style>
<link href="css/newstyles.css" rel="stylesheet" type="text/css" />
</head>
<body>
            <?php
                  // define variables and set to empty values
                  $dateErr = "";
                  $dateValue = "";
                  if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (empty($_POST["date"])) {
                      $dateErr = "You must select a date.";
                    } else{
                        $dateValue = test_input($_POST["date"]);
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
            <li><a href="booking.php" class="active">Book</a></li>
            <li><a href="register.php">Register</a></li>
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
  		<h1>Book a session </h1>
        <span>Sessions run for a minimum of one hour. Please begin by selecting the date and time for your session.</span>
    </div>
      <div class="panel">
      
      
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <div class="contact-form mar-top30">

            <label> <span>Which day do you want to book a session for?<?php echo $dateErr; ?></span>
            <input type="date" class="input_text" name="date" id="date" />
            </label>

            <label> <span>What time do you want to book a session for?</span>
            <select class="input_text" name="time" id="time" style="width:270px" required>
            <option value="nineam">9:00</option>
            <option value="tenam">10:00</option>
            <option value="elevenam">11:00</option>
            <option value="twelvepm">12:00</option>
            <option value="onepm">13:00</option>
            <option value="twopm">14:00</option>
            <option value="threepm">15:00</option>
            <option value="fourpm">16:00</option></select>
            </label>

            <label> <span>How many people will be attending?</span>
            <input type="number" class="input_text" name="attendees" id="attendees" min="1" max="99"/>
            </label>

            <label><span>How would you describe your group's overall experience level?</span>
            <select class="message" name="experience" id="experience">
              <option value="beginner">Beginner</option>
              <option value="intermediate">Intermediate</option>
              <option value="advanced">Advanced</option>
            </select>
            </label>
            
          <div class="title">
			  <h1></br>Additional requests </h1>
			  <span>We offer the hire of one of our world-class skiing instructors along with </br>
             gear hire. Please indicate here if you require either of these services. </span></div>

            <label><span>Do you require an instructor during your ski session?
            <input type="checkbox" class="input_text" name="instructor" id="instructor" style="width:30px;"></span>
            </label>

		  <label><span></br>Do you require equipment hire?
            <input type="checkbox" class="input_text" name="equipment" id="equipment" style="width:30px;" onclick="show_equipment('gearselect')"></span>
            </label>

            <div id="gearselect" style="display:none">
                  <form>
					  <br><input id="skis" name="skis" type="checkbox">Skis <input id="goggles"
                    name="goggles" type="checkbox">Goggles <br> <input id="gloves" name=
                    "gloves" type="checkbox">Gloves <input id="poles" name="poles" type=
                    "checkbox">Poles <br> <input id="boots" name="boots" type="checkbox">Boots
                    <input id="helmet" name="helmet" type="checkbox">Helmet
                  </form>
        </div>

		  <label> <span><br>Additional Comments
            <textarea class="message" name="comment" id="comment"></textarea></span>
            <input type="button" class="button" value="Submit Booking" />
            </label>
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
          <li><img src="images/icon8.png" alt="" />Made as part of 260CT Software Engineering</li>
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
