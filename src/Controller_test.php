<?php
if(isset($_GET))
{
    if($_GET['selector'] == "empList")
    {
        include "getEmployee.php";
    }
    else if($_GET['selector'] == "emp")
    {
        // get to function which return single employee by ID
    }
    
}
else if (isset($_POST))
{
    if($_POST['selector'] == "addEmp")
    {
        // Add another person
    }
}
?>