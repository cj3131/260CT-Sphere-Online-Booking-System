<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Sphere Booking System</title>

        <script src="javascripts/Register_JS.js"></script>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript">
            function chgAction(num)
            '''Function that changes the action of the form nd then submits it to the controller'''
            {
                //document.getElementById("myForm").action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>";
                document.getElementById("myForm").submit();

                if (num == 0){ //if the number of validation error is 0 change the form

                    document.getElementById("myForm").action = "registerController.php";
                    document.getElementById("myForm").submit();
                }
            }
        </script>

        <style>

            .error {color: #ffffff !important;}

        </style>
        <link href="css/newstyles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>

        <?php
        // define variables and set to empty values
        $first_nameErr = $surnameErr = $phoneNumErr = $emailErr = $passwordErr = $comPasswordErr = $DoBErr =  $addLine1Err = $addLine2Err = $cityErr = $countyErr = $postcodeErr = "";
        $first_name = $surname = $phoneNum = $email = $password = $comPassword = $DoB = $addLine1 = $addLine2 = $city = $county = $postcode = "";

        $errorCount = 1;


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //if the form is submitted the run through validation 
            if (empty($_POST["first_name"])) {
                //if text box is empty
                $first_nameErr = "First name is required";
                $errorCount = $errorCount + 1;
            } else {
                $first_name = test_input($_POST["first_name"]);
                // check if input only contains letters
                if (!preg_match("/^[a-zA-Z]*$/",$first_name)) {
                    $first_nameErr = "Only letters allowed";
                    $errorCount = $errorCount + 1;
                }
            }



            if (empty($_POST["surname"])) {
                //if text box is empty
                $surnameErr = "Last name is required";
                $errorCount = $errorCount + 1;
            } else {
                $surname = test_input($_POST["surname"]);
                // check if input only contains letters
                if (!preg_match("/^[a-zA-Z ]*$/",$surname)) {
                    $surnameErr = "Only letters allowed"; 
                    $errorCount = $errorCount + 1;
                }
            }



            if (empty($_POST["phoneNum"])) {
                //if text box is empty
                $phoneNumErr = "Phone number is required";
                $errorCount = $errorCount + 1;
            } else {
                $phoneNum = test_input($_POST["phoneNum"]);
                // check if input only contains numbers
                if (!preg_match("/^[0-9]*$/",$phoneNum)) {
                    $phoneNumErr = "Only numbers are allowed"; 
                    $errorCount = $errorCount + 1;
                }
            }


            if (empty($_POST["email"])) {
                //if text box is empty
                $emailErr = "Email is required";
                $errorCount = $errorCount + 1;
            } else {
                $email = test_input($_POST["email"]);
                // check if e-mail address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format"; 
                    $errorCount = $errorCount + 1;
                }
            }

            if (empty($_POST["password"])) {
                //if text box is empty
                $passwordErr = "Password is required";
                $errorCount = $errorCount + 1;
            } else {
                $password = test_input($_POST["password"]);
                // check if password is to the correct format
                if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/",$password)) {
                    $passwordErr = "Invalid password format"; 
                    $errorCount = $errorCount + 1;
                }
            }

            if (empty($_POST["comPassword"])) {
                //if text box is empty
                $comPasswordErr = "Comfirm Password is required";
                $errorCount = $errorCount + 1;
            } else {
                $password = test_input($_POST["password"]);
                $comPassword = test_input($_POST["comPassword"]);
                if (test_password($password,$comPassword) == false){
                    // check if password and comPassword are the same
                    $passwordErr = "Passwords don't match";
                    $errorCount = $errorCount + 1;
                }
            }

            if (empty($_POST["DoB"])) {
                //if text box is empty
                $DoBErr = "Date of Birth is required";
                $errorCount = $errorCount + 1;
            } else {
                $DoB = test_input($_POST["DoB"]);
                if (test_date($DoB) == false){
                    //checks if date is in the past
                    $DoBErr = "Date of birth has to be a date in the past";
                    $errorCount = $errorCount + 1;
                }
            }

            if (empty($_POST["addLine1"])) {
                //if text box is empty
                $addLine1Err = "An address is required";
                $errorCount = $errorCount + 1;
            } else {
                $addLine1 = test_input($_POST["addLine1"]);
                if (!preg_match("/^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$/",$addLine1)){
                    //checks 
                    $addLine1Err = "Must be a valid address";
                    $errorCount = $errorCount + 1;
                }
            }

            $addLine2 = test_input($_POST["addLine2"]);
            if (!preg_match("/^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$/",$addLine2)){
                $addLine2Err = "Must be a valid address";
                $errorCount = $errorCount + 1;
            }


            if (empty($_POST["city"])) {
                //if text box is empty
                $cityErr = "City is required";
                $errorCount = $errorCount + 1;
            } else {
                $city = test_input($_POST["city"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/",$city)) {
                    $cityErr = "Only letters and white space allowed";
                    $errorCount = $errorCount + 1;
                }
            }

            if (empty($_POST["county"])) {
                //if text box is empty
                $countyErr = "County is required";
                $errorCount = $errorCount + 1;
            } else {
                $county = test_input($_POST["county"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/",$county)) {
                    $countyErr = "Only letters and white space allowed";
                    $errorCount = $errorCount + 1;
                }
            }

            if (empty($_POST["postcode"])) {
                //if text box is empty
                $postcodeErr = "Postcode is required";
                $errorCount = $errorCount + 1;
            } else {
                $postcode = test_input($_POST["postcode"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/[A-Z]{1,2}[0-9][0-9A-Z]?\s?[0-9][A-Z]{2}/",$postcode)) {
                    $postcodeErr = "Valid UK postcodes only";
                    $errorCount = $errorCount + 1;
                }

            }
            $errorCount = $errorCount - 1;

        }
        function Firstname($string){
            if (empty($string)) {
                $first_nameErr = "First name is required";
                return false;
            } else {
                $first_name = $string;
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z]*$/",$string)) {
                    $first_nameErr = "Only letters and white space allowed";
                    return false;
                } else {
                    $first_nameErr = "First name is allowed";
                    return True;
                }
            }
        }

        function testFirstName(){
            $myfile = fopen("testutput.txt", "w") or die("Unable to open file!");
            $tests = array("Tom", "tom", "T0m", "123", "TOM", "", " ", "T om");
            for ($i = 0; $i <= sizeof($tests); $i++) {
                if (Firstname($tests[$i]) == true){
                    $txt = "'$tests[$i]' : Correct\n";
                    fwrite($myfile, $txt);
                } else {
                    $txt = "'$tests[$i]' : Error\n";
                    fwrite($myfile, $txt);
                }
            }
            fclose($myfile);
        }

        function test_date($Date){
            $DateOK = false;
            $todayDate = date("Y-m-d");

            if ($Date < $todayDate){
                $DateOK = true;
            }
            return $DateOK;
        }

        function test_password($Password, $ComPassword){
            $PasswordOK = false;
            if($Password == $ComPassword){
                $PasswordOK = true;
            }
            return $PasswordOK;
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
                    <li><a href="staff_page.html">Log In</a></li>
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


                            <form id= "myForm" method="POST" action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                <div class="contact-form mar-top30">

                                    <label > <span>First Name * </span>
                                        <input type="text" name="first_name" class="input_text" value="<?php echo $first_name;?>"> <!--diplays the users last input back to the text box -->
                                    </label>
                                    <Label class = "error"><?php echo $first_nameErr; ?></Label> <!--Displays error message to the user iterface -->

                                    <label> <span>Surname *</span>
                                        <input type="text" name="surname" class="input_text" value="<?php echo $surname;?>"><!--diplays the users last input back to the text box -->
                                    </label>
                                    <Label class = "error"><?php echo $surnameErr;?></Label><!--Displays error message to the user iterface -->

                                    <label> <span>Date of Birth *</span>
                                        <input id="DoB" type="date" name="DoB" class="input_text" value="<?php echo $DoB;?>"><!--diplays the users last input back to the text box -->
                                    </label>
                                    <Label class = "error"><?php echo $DoBErr;?></Label><!--Displays error message to the user iterface -->

                                    <div class="title">
                                        <h1><br>Contact details</h1>
                                        <span>Enter your contact details below. We will never sell your details to third parties and will only use these details to contact you with offers or to confirm bookings.</span></div>

                                    <label> <span>Email Address *</span>
                                        <input type="text" name="email" class="input_text" value="<?php echo $email;?>"><!--diplays the users last input back to the text box -->
                                    </label>
                                    <Label class = "error"><?php echo $emailErr;?></Label><!--Displays error message to the user iterface -->

                                    <label> <span>Phone Number</span>
                                        <td><input type="number" name="phoneNum" class="input_text" value="<?php echo $phoneNum;?>"><!--diplays the users last input back to the text box -->
                                    </label>
                                    <Label class = "error"><?php echo $phoneNumErr;?></Label><!--Displays error message to the user iterface -->

                                    <div class="title">
                                        <h1><br>Enter a password</h1>
                                        <span>Please select a password. It must be at least 6 characters and contain at least one letter and number.</span></div>

                                    <label> <span>Password *</span>
                                        <input type="password" name="password" class="input_text" value="<?php echo $password;?>"><!--diplays the users last input back to the text box -->
                                    </label>
                                    <Label class = "error"><?php echo $passwordErr;?></Label><!--Displays error message to the user iterface -->

                                    <label> <span>Confirm Password *</span>
                                        <input type="password" name="comPassword" class="input_text" value="<?php echo $comPassword;?>"><!--diplays the users last input back to the text box -->
                                    </label>
                                    <Label class = "error"><?php echo $comPasswordErr;?></Label><!--Displays error message to the user iterface -->

                                    <div class="title">
                                        <h1><br>Address details</h1>
                                        <span>Enter your address details below. We will never sell your details to third parties and will only use these details to contact you with offers or to confirm bookings.</span></div>

                                    <label><span>Address Line *</span></label>
                                    <input type="text" name="addLine1" class="input_text" value="<?php echo $addLine1;?>"><!--diplays the users last input back to the text box -->
                                    <Label class = "error"><?php echo $addLine1Err;?></Label><!--Displays error message to the user iterface -->

                                    <label><span>Address Line 2</span></label>
                                    <input type="text" name="addLine2" class="input_text" value="<?php echo $addLine2;?>"><!--diplays the users last input back to the text box -->
                                    <Label class = "error"><?php echo $addLine2Err;?></Label><!--Displays error message to the user iterface -->

                                    <label><span>City *</span></label>
                                    <input type="text" name="city" class="input_text" value="<?php echo $city;?>"><!--diplays the users last input back to the text box -->
                                    <Label class = "error"><?php echo $cityErr;?></Label><!--Displays error message to the user iterface -->

                                    <label><span>County *</span></label>
                                    <input type="text" name="county" class="input_text" value="<?php echo $county;?>"><!--diplays the users last input back to the text box -->
                                    <Label class = "error"><?php echo $countyErr;?></Label><!--Displays error message to the user iterface -->

                                    <label><span>Postcode *</span></label>
                                    <input type="text" name="postcode" class="input_text" value="<?php echo $postcode;?>"><!--diplays the users last input back to the text box -->
                                    <Label class = "error"><?php echo $postcodeErr;?></Label><!--Displays error message to the user iterface -->

                                    <input type="submit" class="button" value="Register" onclick= "chgAction(<?php echo $errorCount;?>)"/><!--diplays the users last input back to the text box -->
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

