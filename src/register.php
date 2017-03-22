<!DOCTYPE html>


<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/StyleSheet.css">
        <title>Online Booking System</title>
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
        
        <ul class="navH">
            <li><a href="home.html" title="home">Home</a></li>
            <li><a href="booking.php" title="booking">Booking</a></li>
            <li class="active"><a href="register.php" title="register">Register</a></li>
            <li><a href="login.html" title="login">Log in</a></li>
            <li><a href="updatedetails.html" title="update">Update Details</a></li>
        </ul>
    
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            
            <div class= "title">
                <h1>Register</h1>
            </div>
            <table>
            <tr>
                <td><label>Name: </label></td>
                <td><input type="text" name="first_name" value="<?php echo $first_name;?>"></td>
                      <td><span class="error">* <?php echo $first_nameErr;?></span></td>
            </tr> 
            <tr>
                <td><label>Surname</label></td>
                <td><input type="text" name="customer_surname" ></td>
            </tr>
            <tr>
                <td><label>Phone Number</label></td>
                    <td><input type="number" name="phone_number" ></td>
            </tr>
            <tr>
                <td><label>Email address</label></td>
                <td><input type="email" name="email_address" ></td>
            </tr>
            <tr>
                <td><label for="DoB">Date Of Birth</label></td>
                <td><input id="DoB" type="date" name="dob" style = "width: 173px"></td>
            </tr>
            <tr>
                <td><label>New Password</label></td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td><label>Comfirm New Password</label></td>
                <td><input type="password" name="confirm_password"></td>
            </tr>

            <!--
                <p><label>Address Line</label>
                <input type="text" name="customer_address1" autofocus></p>
                <p><label>Address Line (optional)</label>
                <input type="text" name="customer_address2" autofocus></p>
                <p><label>City</label>
                <input type="text" name="customer_city" autofocus></p>
                <p><label>County</label>
                <input type="text" name="customer_county" autofocus></p>
                <p><label>Postcode</label>
                <input type="text" name="customer_postcode" autofocus></p>
                <br><br><br>
-->

                <input type="submit" value="Submit">
			</table>
           
        </form>
        
        <footer>
            <a href="contact.html">Contact us</a> <a href="https://www.paypal.me/CallumHuntington">Send us money</a> <a href="about.html">About</a>
        </footer>
            
    </body>
</html>