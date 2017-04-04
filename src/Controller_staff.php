<?php
/*ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);*/

require("Staff_Entities.php");

class emp_controller
{
    // --- VARIABLES ---
    
    private $conn = 0;
    private $empFactory = 0;
    private $employeeList = 0;
    
    // --- CONSTRUCTOR ---
    
    function __construct()
    {
        $this->empFactory = new EmployeeFactory();
        $this->employeeList = $this->empFactory->getAllEmployees();
    }
    
    // --- Handler ---

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
    
    private function insertDB() // VALIDATE POST
    {
        //($type, $fname, $lname, $salary, $dbSave = false, $ID = NULL) 
        
        $pData = $_POST["data"];
        
        $firstname = $pData["Fname"];
        $lastname = $pData["Lname"];
        $role = $pData["Role"];
        $salary = $pData["Salary"];
        
        $inList = false;
        
        foreach($this->employeeList as $obj)
        {
            if($firstname == $obj->getFname() and $lastname == $obj->getLname())
            {
                $inList = true;
            }
        }
        
        if ($inList == false)
        {
            $this->empFactory->makeEmployee($Role,$firstname,$lastname,$salary,true,NULL);
        }
    }
    
    private function DeleteDB()
    {
        $ID = $_POST["data"]["ID"];
        foreach($this->employeeList as $obj)
        {
            if($ID == $obj->getID())
            {
                $this->empFactory->DeleteDB($ID);
            }
        }
    }
}

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