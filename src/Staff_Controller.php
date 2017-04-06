<?php

// Serves as Include but, if it's not avaible it will give error 
require("Staff_Entities.php");

// Employee Controller
abstract class emp_controller
{
    // --- VARIABLES ---

    protected $empFactory = 0;
    protected $employeeList = 0;

    // --- CONSTRUCTOR ---
    // Prepares Employee factory for work
    function __construct()
    {
        $this->empFactory = new EmployeeFactory();
        $this->employeeList = $this->empFactory->getAllEmployees();
    }
}

class DisplayEmpCont extends emp_controller
{
    // Making sure that parent class construct is called
    function __construct()
    {
        parent::__construct();
    }

    // Display function
    // Gets all current employees
    // Encodes from objects to JSON type file
    // Sends it back to Javascript fuction which originaly called this PHP
    public function display()
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
    public function select()
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
}

class AddEmpCont extends emp_controller
{
    // Making sure that parent class construct is called
    function __construct()
    {
        parent::__construct();
    }

    // Inserts new employee to database
    public function insertDB() 
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
}

class DelEmpCont extends emp_controller
{
    // Making sure that parent class construct is called
    function __construct()
    {
        parent::__construct();
    }

    // Delete Employee 
    public function DeleteDB()
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
// POST and GET contain data which is sent from outside
if(isset($_GET["selector"]) or isset($_POST["selector"]))
{
    // If values are set proceed to identify what kind of request was sent
    requestHandler();
}

// --- Handler ---
// Handles different types of actions to execute
function requestHandler()
{
    // Based on variable selector goes appropriate controller
    $cont = 0;
    
    if($_GET["selector"] == "empList")
    {
        $cont = new DisplayEmpCont();
        $cont->display();
    }

    if($_GET["selector"] == "selEmp")
    {
        $cont = new DisplayEmpCont();
        $cont->select();
    }

    if($_POST["selector"] == "delEmp")
    {
        $cont = new DelEmpCont();
        $cont->DeleteDB();
    }

    if($_POST["selector"] == "addEmp")
    {
        $cont = new AddEmpCont();
        $cont->InsertDB();
    }  
}
?>