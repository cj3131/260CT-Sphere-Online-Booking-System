<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/StyleSheet.css">
        <title>Online Booking System</title>
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
    </head>
    <body>
        
        <?php
            // define variables and set to empty values
            $dateErr = "";
            $dateValue = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
              if (empty($_POST["dateValue"])) {
                $dateErr = "You must select a date.";
              } else{
                  $dateValue = test_input($_POST["dateValue"]);
              }
            }
            function test_input($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
            }
        ?>
        
        
        
       <div class="container">
        <div>
            <ul class="navH">
                <li><a href="home.html" title="home">Home</a></li>
                <li class="active"><a href="booking.html" title="booking">Booking</a></li>
                <li><a href="register.html" title="register">Register</a></li>
                <li><a href="login.html" title="login">Log in</a></li>
                <li><a href="updatedetails.html" title="update">Update Details</a></li>
            </ul>
        </div>

        <h1>Book a session</h1>

        <div class ="form"><form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div>
              <table width="450px">
				<tr>
				  <td valign="top">
					<label class= "entrylabel" for="date">Which day do you want to book a session for?</label>
				  </td>
				  <td valign="top">
					<input id="date" type="date" name="date" style = "width: 173px">
				  </td>
                    <td><span class="error">* <?php echo $dateErr; ?> </span></td>
				</tr>
				
				<tr>
				  <td valign="top">
				   <label for="time">What time do you want to book a session for?</label>
				  </td>
				  <td valign="top">
				    <select id="time" name="time" required>
				 	  <option value="nineam">9:00</option>
				 	  <option value="tenam">10:00</option>
				 	  <option value="elevenam">11:00</option>
				   	  <option value="twelvepm">12:00</option>
					  <option value="onepm">13:00</option>
				  	</select>
				 </td>
				</tr>
				
				<tr>
				  <td valign="top">
					<label for="attendees"></label> How many people will be attending?
				  </td>
				  <td valign="top">
				    <input type="number" id="attendees" name="attendees" value="1" required>
				  </td>
				</tr>

				<tr>
				 <td valign="top">
				  <label for="experience">How would you describe your group's overall experience level?</label>
				 </td>
				 <td valign="top">
				  <select id="experience" name="experience" required>
					<option value="beginner">Beginner</option>
					<option value="intermediate">Intermediate</option>
					<option value="advanced">Pro</option>
				  </select>
				 </td>
				</tr>

					<tr>
					 <td valign="top">
					  <label for="comment">Additional Comments </label>
					 </td>
					 <td valign="top">
					   <textarea name="comment" id="comment"></textarea>
					</td>
					</tr>

					<tr>
					 <td valign="top">
					  <label for="instructor">Do you require an instructor during your ski session?</label>
					 </td>
					 <td valign="top">
					  <input type="checkbox" name="instructor" id="instructor">
					 </td>
					</tr>
                  
                    <tr>
					 <td valign="top">
					  <label for="equipment">Do you require equipment hire?</label>
					 </td>
					 <td valign="top">
					  <input type="checkbox" name="equipment" id="equipment" onclick="show_equipment('gearselect')">
					 </td>
					
					
                  <td>
                    <div id="gearselect" style="display:none">
                        <form>
                            <input type="checkbox" name="skis" id="skis">Skis
                            <input type="checkbox" name="goggles" id="goggles">Goggles
                            <input type="checkbox" name="gloves" id="gloves">Gloves
                            <input type="checkbox" name="poles" id="poles">Poles
                            <input type="checkbox" name="boots" id="boots">Boots
                            <input type="checkbox" name="helmet" id="helmet">Helmet
                        </form>
                    </div>
                  </td>
					</tr>
							
					<tr>
					 <td colspan="0" style="text-align:center">
					  <input type="submit" value="Submit">
					 </td>
					</tr>
				</table>
				
            </div>
        </form>
        </div>
        <footer>
            <a href="contact.html">Contact us</a> <a href="https://www.paypal.me/CallumHuntington">Send us money</a> <a href="about.html">About</a>
        </footer>
    </div>
    </body>
<!--
http://stackoverflow.com/questions/25241295/redirect-to-new-page-after-form-submitted-and-validated-using-php?rq=1
http://stackoverflow.com/questions/18421082/show-hide-div-if-checkbox-selected
--></html>
