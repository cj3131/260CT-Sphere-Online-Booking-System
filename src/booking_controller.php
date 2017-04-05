<?php
require("booking_model.php");

class booking_controller
{
    // --- VARIABLES ---
    
    private $conn = 0;
    private $bookingFactory = 0;
    private $bookingList = 0;
    
    // --- CONSTRUCTOR ---
    
    function __construct()
    {
        $this->bookingFactory = new BookingFactory();
        $this->bookingList = $this->bookingFactory->getAllBookings();
    }
        
    private function insertDB() // VALIDATE POST
    {
        $date = $_POST["date"];
        $starttime = $_POST["starttime"];
        $endtime = $_POST["endtime"];

        $attendees = $_POST["attendees"];
        $experience = $_POST["experience"];
        $comments = $_POST["comments"];
        $equipment = $_POST["equipment"];
        $instructor = $_POST["instructor"];
        $total_attendees = "";
        
                //select the session with given date/time, if it exists
        $sql = "SELECT * FROM sessions WHERE date = '{$date}' AND starttime = '{$starttime}' AND endtime = '{$endtime}'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {		
            // output data of each row		
            while($row = $result->fetch_assoc()) {
                $session_id = $row["session_id"];
            }		
        }

        else{
            //session does not exist, so create it, then select it's session_id
            $sql = "INSERT INTO sessions (date, starttime, endtime) VALUES ('{$date}','{$starttime}','{$endtime}')";

            if ($conn->query($sql) === TRUE) {
                //echo "New date/time session created successfully";
            }else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            //select the newly made session_id and assign it to $session_id
            $sql = "SELECT * FROM sessions WHERE date = '{$date}' AND starttime = '{$starttime}' AND endtime = '{$endtime}'";
            $result = $conn->query($sql);		

            if ($result->num_rows > 0) {	
                // output data of each row		
                while($row = $result->fetch_assoc()) {
                    $session_id = $row["session_id"];
                }
            }
        }

        //get the total number of attendees currently booked onto this session and assign it to $total_attendees
        $sql = "SELECT total_attendees FROM sessions WHERE session_id = '{$session_id}'";
        $result = $conn->query($sql);		

        if ($result->num_rows > 0) {		
            // output data of each row		
            while($row = $result->fetch_assoc()) {
                $total_attendees = $attendees + $row["total_attendees"];
                //echo $total_attendees;
            }		
        }

        if ($total_attendees > "50") {
            header( "refresh:0; url=booking.php" );

            echo '<script language="javascript">';
            echo 'alert("There are too many people already booked onto that session. Please choose another time slot.")';
            echo '</script>';

            //echo "<script type='text/javascript'>alert('There are too many people booked onto that session already.'".$total_attendees.");</script>";
            //header("Location: booking.php");
            die();
        }

        $sql = "UPDATE sessions SET total_attendees = '{$total_attendees}' WHERE session_id = '{$session_id}'";
        $result = $conn->query($sql);	
        if ($conn->query($sql) === TRUE) {
            //echo "Attendees updated.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $sql = "INSERT INTO bookings (session_id, attendees, experience, equipment, instructor) VALUES ('{$session_id}','{$attendees}','{$experience}','{$equipment}','{$instructor}')";
        if ($conn->query($sql) === TRUE) {
            //echo "Booking successfully created";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        {
            $this->bookingFactory->makeBooking($date,$starttime,$endtime,$attendees,$experience,$comments,$equipment,$instructor,$total_attendees;
        }
    }
}
$cont = new booking_controller();
$cont->addBooking();
?>