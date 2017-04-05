<?php

// Serves as Include but, if it's not avaible it will give error 
require("Staff_Entities.php");

// Employee Controller
class emp_controller
{
    // --- VARIABLES ---
    
    private $empFactory = 0;
    private $employeeList = 0;
    
    // --- CONSTRUCTOR ---
    // Prepares Employee factory for work
    function __construct()
    {
        $this->empFactory = new EmployeeFactory();
        $this->employeeList = $this->empFactory->getAllEmployees();
    }
    
    // --- Handler ---
    // Handles different types of actions to execute
    public function requestHandler()
    {
        if($_GET["selector"] == "empList")
        {
            $this->display();
        }
        
        if($_GET["selector"] == "selEmp")
        {
            $this->select();
        }
        
        if($_POST["selector"] == "delEmp")
        {
            $this->DeleteDB();
        }
        
        if($_POST["selector"] == "addEmp")
        {
            $this->InsertDB();
        }  
    }
     
    // --- PRIVATE ---
    
    // Display function
    // Gets all current employees
    // Encodes from objects to JSON type file
    // Sends it back to Javascript fuction which originaly called this PHP
    private function display()
    {       
        $array_ret = Array();     
        foreach($this->employeeList as $obj)
        {
            $tmp = Array("staff_id" => "{$obj->getID()}",
                         "first_name" => "{$obj->getFname()}",
                         "last_name" => "{$obj->getLname()}",
                         "role" => "{$obj->getRole()}",
                         "salary" => "{$obj->getSalary()}");
            array_push($array_ret,$tmp);
        }
        echo json_encode($array_ret);
    }
    
    // Get single employee,
    // Acts very similarly to Display
    private function select()
    {
        $ID = $_GET["data"]["ID"];
        $array_ret = Array();
        foreach($this->employeeList as $obj)
        {
            if($ID == $obj->getID())
            {
                $tmp = Array("staff_id" => "{$obj->getID()}",
                             "first_name" => "{$obj->getFname()}",
                             "last_name" => "{$obj->getLname()}",
                             "role" => "{$obj->getRole()}",
                             "salary" => "{$obj->getSalary()}");
                array_push($array_ret,$tmp);
            }
        }
        echo json_encode($array_ret);
    }
    
    // Inserts new employee to database
    private function insertDB() 
    {
        // unpack the data from POST request
        $pData = $_POST["data"];
        
        $firstname = $pData["Fname"];
        $lastname = $pData["Lname"];
        $role = $pData["Role"];
        $salary = $pData["Salary"];
        
        $inList = false;
        
        // Check if the employee exists
        foreach($this->employeeList as $obj)
        {
            if($firstname == $obj->getFname() and $lastname == $obj->getLname())
            {
                $inList = true;
            }
        }
        
        // If it doesn't exist, add it
        if ($inList == false)
        {
            $this->empFactory->makeEmployee($role,$firstname,$lastname,$salary,true,NULL);
        }
    }
    
    // Delete Employee 
    private function DeleteDB()
    {
        $ID = $_POST["data"]["ID"];
        foreach($this->employeeList as $key => $obj)
        {
            if($ID == $obj->getID())
            {
                $this->empFactory->DeleteDB($ID);
            }
        }
    }
}

// Check if POST and GET came with set selector value
// To prevent outside access to operations
if(isset($_GET["selector"]) or isset($_POST["selector"]))
{
    $cont = new emp_controller();
    $cont->requestHandler();
}
else
{
    echo "Not POST or GET, bugger off";
}
?>