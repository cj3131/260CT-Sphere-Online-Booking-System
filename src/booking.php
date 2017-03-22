<!DOCTYPE html>

<html>
<head>
	<link href="css/StyleSheet.css" rel="stylesheet" type="text/css">

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

	<div class="container">
        <header>
            <div>
                <span class="logo"><div id="divlogo">
                    <img src="graphics/logo.png" width="300" height="44" align="middle">
                </div>
                </span>
                <ul class="navH">
                    <li>
                        <a href="home.html" title="home">Home</a>
                    </li>


                    <li class="active">
                        <a href="booking.php" title="booking">Booking</a>
                    </li>


                    <li>
                        <a href="register.html" title="register">Register</a>
                    </li>


                    <li>
                        <a href="login.html" title="login">Log in</a>
                    </li>


                    <li>
                        <a href="updatedetails.html" title="update">Update Details</a>
                    </li>
                </ul>
            </div>
        </header>


		<h1>Book a session</h1>


		<div class="form">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

				<div>

					<table width="550px">
						<tr>
							<td valign="top"><label class="entrylabel" for="date">Which day do you
							want to book a session for?</label>
							</td>

							<td valign="top"><input id="date" name="date" style="width: 173px" type=
							"date">
							</td>

							<td><span class="error">*This field is required<?php echo $dateErr; ?></span>
							</td>
						</tr>


						<tr>
							<td valign="top"><label for="time">What time do you want to book a
							session for?</label>
							</td>

							<td valign="top"><select id="time" name="time" required="">
								<option value="nineam">
									9:00
								</option>

								<option value="tenam">
									10:00
								</option>

								<option value="elevenam">
									11:00
								</option>

								<option value="twelvepm">
									12:00
								</option>

								<option value="onepm">
									13:00
								</option>
                                
                                <option value="twopm">
									14:00
								</option>
                                
                                <option value="threepm">
									15:00
								</option>
                                
                                <option value="fourpm">
									16:00
								</option>
							</select>
							</td>
						</tr>


						<tr>
							<td valign="top"><label for="attendees"></label> How many people will be
							attending?</td>

							<td valign="top"><input id="attendees" name="attendees" required=""
							type="number" value="1" min="1" max="99">
							</td>
						</tr>


						<tr>
							<td valign="top"><label for="experience">How would you describe your
							group's overall experience level?</label>
							</td>

							<td valign="top"><select id="experience" name="experience" required="">
								<option value="beginner">
									Beginner
								</option>

								<option value="intermediate">
									Intermediate
								</option>

								<option value="advanced">
									Advanced
								</option>
							</select>
							</td>
						</tr>


						<tr>
							<td valign="top"><label for="comment">Additional Comments</label>
							</td>

							<td valign="top">
							<textarea id="comment" name="comment"></textarea>
							</td>
						</tr>


						<tr>
							<td valign="top"><label for="instructor">Do you require an instructor
							during your ski session?</label>
							</td>

							<td valign="top"><input id="instructor" name="instructor" type=
							"checkbox">
							</td>
						</tr>


						<tr>
							<td valign="top"><label for="equipment">Do you require equipment
							hire?</label>
							</td>

							<td valign="top"><input id="equipment" name="equipment" onclick=
							"show_equipment('gearselect')" type="checkbox">
							</td>

							<td>
								<div id="gearselect" style="display:none">
									<form>
										<input id="skis" name="skis" type="checkbox">Skis <input id="goggles"
										name="goggles" type="checkbox">Goggles <br> <input id="gloves" name=
										"gloves" type="checkbox">Gloves <input id="poles" name="poles" type=
										"checkbox">Poles <br> <input id="boots" name="boots" type="checkbox">Boots
										<input id="helmet" name="helmet" type="checkbox">Helmet
									</form>
								</div>
							</td>
						</tr>


						<tr>
							<td colspan="2" style="text-align:center"><input type="submit" value=
							"Submit">
							</td>
						</tr>
					</table>
				</div>
			</form>
		</div>


		<footer>
			<a href="contact.html">Contact us</a> <a href=
			"https://www.paypal.me/CallumHuntington">Send us money</a> <a href=
			"about.html">About</a>
		</footer>
	</div>
	<!--
http://stackoverflow.com/questions/25241295/redirect-to-new-page-after-form-submitted-and-validated-using-php?rq=1
http://stackoverflow.com/questions/18421082/show-hide-div-if-checkbox-selected
-->
</body>
</html>