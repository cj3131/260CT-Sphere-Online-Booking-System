<?php
/*ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);*/

if(isset($_GET) or isset($_POST))
{
    $cont = new emp_controller();
    $cont->requestHandler();
}
else
{
    echo "You are not post or get so bugger off";
}

class emp_controller
{
    // --- VARIABLES ---
    
    private $conn = 0;
    
    // --- CONSTRUCTOR/DESTRUCTOR ---
    
    function __construct()
    {
        $this->connect_DB();
    }
    
    function __destruct()
    {
        $this->close_DB();
    }
    
    // --- PUBLIC ---

    public function requestHandler()
    {
        if($_GET["selector"] == "empList")
        {
            $this->display();
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
    
    private function connect_DB()
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
    
    private function close_DB()
    {
        $this->conn->close();
    }
    
    private function display()
    {       
        $sql = "SELECT * FROM staff";
        $result = $this->conn->query($sql);

        $array_ret = Array();

        if ($result->num_rows > 0) 
        {
            // output data of each row
            while($row = $result->fetch_assoc()) 
            {
                array_push($array_ret,$row);
            }
        }

        echo json_encode($array_ret);
    }
    
    private function insertDB() // VALIDATE POST
    {
        $pData = $_POST["data"];
        
        $firstname = $pData[0];
        $lastname = $pData[1];
        $role = $pData[2];
        $salary = $pData[3];

        $sql = "INSERT INTO staff (first_name,last_name,role,salary) VALUES ('{$firstname}','{$lastname}','{$role}','{$salary}')";
        if ($this->conn->query($sql) === FALSE) 
        {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }
    
    private function DeleteDB()
    {
        
        $ID = $_POST["data"][0];
    
        $sql = "DELETE FROM staff WHERE staff_id = '{$ID}'";
        if ($this->conn->query($sql) === FALSE) 
        {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }
}
?>