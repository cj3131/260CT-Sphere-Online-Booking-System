<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/StyleSheet.css">
    </head>
    <body>
        <form method="post" action="">
            <div class= "left" style="text-align: left">
                <p >Add employee</p>
                <p>
                    <label>First Name</label>
                    <input type="text" name="Staff_fname" autofocus>
                </p>
                <p>
                    <label>Last name</label>
                    <input type="text" name="Staff_lname" >
                </p>
                <p>
                    <label>Role</label>
                    <select name="Role">
                        <option value="Manager">Manager</option>
                        <option value="Reception">Reception</option>
                        <option value="IT Support">IT Support</option>
                        <option value="Staff">Staff</option>
                    </select>
                </p>
                <p>
                    <label>Salary(ph)</label>
                    <input type="text" name="Salary" >
                </p>   
                <input type="submit" name="SubmitButton"> 
            </div>
        </form>

        <form method="post" action="">
            <div class= "right" style="text-align: left">
                <p>Delete employee</p>
                <p>
                    <label>Staff ID</label>
                    <input type="text" name="ID" autofocus>
                </p>  
                <input type="submit" name="SubmitButton2"> 
            </div>
        </form>
    </body>
</html>

<?php
if(isset($_POST['SubmitButton']))
{
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
    
    $firstname = $_POST["Staff_fname"];
    $lastname = $_POST["Staff_lname"];
    $role = $_POST["Role"];
    $salary = $_POST["Salary"];
        

    $sql = "INSERT INTO staff (first_name,last_name,role,salary) VALUES ('{$firstname}','{$lastname}','{$role}','{$salary}')";
    if ($conn->query($sql) === TRUE) 
    {
        echo "<script> alert('New record created successfully')</script>";
    } 
    else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<?php
if(isset($_POST['SubmitButton2']))
{
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
    
    $ID = $_POST["ID"];
    
    $sql = "DELETE FROM staff WHERE staff_id = '{$ID}'";
    if ($conn->query($sql) === TRUE) 
    {
        echo "<script> alert('record deleted')</script>" ;

    } 
    else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

