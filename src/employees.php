<html>
    <head>
        <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
        </style>
    </head>
    <body>
        <table>
          <tr>
            <th>ID</th>
            <th>FirstName</th>
            <th>Last Name</th>
            <th>Role</th>
            <th>Salary</th>
          </tr>
            <?php
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

            $sql = "SELECT * FROM staff";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) 
            {
                // output data of each row
                while($row = $result->fetch_assoc()) 
                {
                    echo "<tr><td>" .$row["staff_id"]. 
                         "</td>"."<td>" .$row["first_name"]. 
                         "</td>"."<td>" .$row["last_name"]. 
                         "</td>"."<td>" .$row["role"]. "</td>".
                         "<td>" .$row["salary"]. "</td></tr>";
                }
            }

            $conn->close();

            ?>
        </table>
    </body>
</html>   


