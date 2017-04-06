<?php

class EmployeeFactory 
{
    // --- Database Connection ---
    private $conn = 0;
    
    function __construct()
    {
        $this->ConnectDB();
    }
    function __destruct()
    {
        $this->DisconnectDB();
    }
    
    private function ConnectDB()
    {
        // Connection details
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sphere5_db";
        
        // Create connection
        $this->conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    private function DisconnectDB()
    {
        $this->conn->close();
    }
    
    // --- Public functions ---
    
    // Saves data to Database and creates, equivalent Employee object for later use
    public function makeEmployee($type, $fname, $lname, $salary, $dbSave = false, $ID = NULL) 
    {
        $employee = 0;
        // There are 2 options:
        // 1. Get the employees from database and create new employee object
        // 2. Add new employee to database and create new employee object
        if($dbSave == true)
        {
            $sql = "INSERT INTO staff (first_name,last_name,role,salary) VALUES ('{$fname}','{$lname}','{$type}','{$salary}')";
            if ($this->conn->query($sql) === FALSE) 
            {
                echo "Error: " . $sql . "<br>" . $this->conn->error;
            }
            
            $ID = (string)$this->conn->insert_id; 
        }
        
        // Decides what type of employee it is
        switch ($type) 
        {
            case "Manager":
                $employee = new Manager($ID,$fname, $lname, $salary);
                break;
            case "SlopeOperator":
                $employee = new SlopeOperator($ID,$fname,$lname, $salary);
                break;
            case "SkiInstructor":
                $employee = new SkiInstructor($ID,$fname,$lname, $salary);
                break;
            case "Other":
                $employee = new Other($ID,$fname,$lname, $salary);
                break;
            default:
                $employee = new Other($ID,$fname,$lname, $salary);
                break;        
        }
        return $employee;
    }
    
    // Bulk creation of all employees
    // Multiple calls of makeEmployee
    public function getAllEmployees()
    {
        // get all data from database
        $sql = "SELECT * FROM staff";
        $result = $this->conn->query($sql);
        $array_ret = Array();
           
        // check if not empty
        if ($result->num_rows > 0) 
        {
            // output data of each row
            while($row = $result->fetch_assoc()) 
            {
                // make employee object
                $emp = $this->makeEmployee($row["role"],$row["first_name"],$row["last_name"],$row["salary"],false,$row["staff_id"]);
                // pus it to array
                array_push($array_ret,$emp);
            }
        }
        
        // return array to controller for later use
        return $array_ret;
    }
    
    // Delete employee from database
    function DeleteDB($ID)
    {
        $sql = "DELETE FROM staff WHERE staff_id = '{$ID}'";
        if ($this->conn->query($sql) === FALSE) 
        {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }
}

// Base class for employees
abstract class AbstractEmployee
{
    // Shared variables
    protected $id;
    protected $firstname;
    protected $lastname;
    protected $role;
    protected $salary;
    
    // set some shared variables
    function __construct($ID,$fname,$lname) 
    {
        $this->id = $ID;
        $this->firstname = $fname;
        $this->lastname = $lname;
    }
    
    //prototype function for overwriting
    protected abstract function calculateSalary();
    
    // Get function for needed variables
    public function getID()
    {
        return $this->id;
    }
    public function getFname()
    {
        return $this->firstname;
    }
    public function getLname()
    {
        return $this->lastname;
    }
    public function getRole()
    {
        return $this->role;
    }
    public function getSalary()
    {
        return $this->salary;
    }
}

// Derived classes from abstract class
class Manager extends AbstractEmployee 
{
    // Add class specific values
    function __construct($ID,$fname,$lname,$salary) 
    {
        parent::__construct($ID,$fname,$lname);
        $this->role = "Manager";
        $this->salary = $this->calculateSalary($salary);
    }
    
    // Calcuate Salary, if it was not set previously
    // Based on which class/role it is
    protected function calculateSalary($salary = 0)
    {
        if($salary == 0)
            return 20;
        else
            return $salary;
    }
}

class SlopeOperator extends AbstractEmployee 
{
    // Add class specific values
    function __construct($ID,$fname,$lname,$salary) 
    {
        parent::__construct($ID,$fname,$lname);
        $this->role = "SlopeOperator";
        $this->salary = $this->calculateSalary($salary);
    }
    
    // Calcuate Salary, if it was not set previously
    // Based on which class/role it is
    protected function calculateSalary($salary = 0)
    {
        if($salary == 0)
            return 15;
        else
            return $salary;
    }
}
class SkiInstructor extends AbstractEmployee 
{
    // Add class specific values
    function __construct($ID,$fname,$lname,$salary) 
    {
        parent::__construct($ID,$fname,$lname);
        $this->role = "SkiInstructor";
        $this->salary = $this->calculateSalary($salary);
    }
    
    // Calcuate Salary, if it was not set previously
    // Based on which class/role it is
    protected function calculateSalary($salary = 0)
    {
        if($salary == 0)
            return 10;
        else
            return $salary;
    }
}
class Other extends AbstractEmployee 
{
    // Add class specific values
    function __construct($ID,$fname,$lname,$salary) 
    {
        parent::__construct($ID,$fname,$lname);
        $this->role = "Other";
        $this->salary = $this->calculateSalary($salary);
    }
    
    // Calcuate Salary, if it was not set previously
    // Based on which class/role it is
    protected function calculateSalary($salary = 0)
    {
        if($salary == 0)
            return 10;
        else
            return $salary;
    }
}
?>