<?php

class BookingFactory 
{
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
    
    function makeBooking($type, $fname, $lname, $salary, $dbSave = false, $ID = NULL) 
    {
        $employee = 0;
        
        if($dbSave == true)
        {
            $sql = "INSERT INTO staff (first_name,last_name,role,salary) VALUES ('{$fname}','{$lname}','{$type}','{$salary}')";
            if ($this->conn->query($sql) === FALSE) 
            {
                echo "Error: " . $sql . "<br>" . $this->conn->error;
            }
            
            $ID = (string)$this->conn->insert_id; 
        }
        
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
    
    function getAllEmployees()
    {
        $sql = "SELECT * FROM staff";
        $result = $this->conn->query($sql);

        $array_ret = Array();

        if ($result->num_rows > 0) 
        {
            // output data of each row
            while($row = $result->fetch_assoc()) 
            {
                $emp = $this->makeEmployee($row["role"],$row["first_name"],$row["last_name"],$row["salary"],false,$row["staff_id"]);
                array_push($array_ret,$emp);
            }
        }
        
        return $array_ret;
    }
    
    function DeleteDB($ID)
    {
        $sql = "DELETE FROM staff WHERE staff_id = '{$ID}'";
        if ($this->conn->query($sql) === FALSE) 
        {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }
}

abstract class AbstractEmployee
{
    protected $id;
    protected $firstname;
    protected $lastname;
    protected $role;
    protected $salary;
    
    function __construct($ID,$fname,$lname) 
    {
        $this->id = $ID;
        $this->firstname = $fname;
        $this->lastname = $lname;
    }
    
    protected abstract function calculateSalary();
    
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

class Manager extends AbstractEmployee 
{
    function __construct($ID,$fname,$lname,$salary) 
    {
        parent::__construct($ID,$fname,$lname);
        $this->role = "Manager";
        $this->salary = $this->calculateSalary($salary);
    }
    
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
    function __construct($ID,$fname,$lname,$salary) 
    {
        parent::__construct($ID,$fname,$lname);
        $this->role = "SlopeOperator";
        $this->salary = $this->calculateSalary($salary);
    }
    
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
    function __construct($ID,$fname,$lname,$salary) 
    {
        parent::__construct($ID,$fname,$lname);
        $this->role = "SkiInstructor";
        $this->salary = $this->calculateSalary($salary);
    }
    
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
    function __construct($ID,$fname,$lname,$salary) 
    {
        parent::__construct($ID,$fname,$lname);
        $this->role = "Other";
        $this->salary = $this->calculateSalary($salary);
    }
    
    protected function calculateSalary($salary = 0)
    {
        if($salary == 0)
            return 10;
        else
            return $salary;
    }
}
?>