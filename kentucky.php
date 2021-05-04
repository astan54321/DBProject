<?php
   include_once("./library.php"); // To connect to the database
   $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);
   // Check connection
   if (mysqli_connect_errno())
     {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
     }

   // Form the SQL query (an INSERT query)
   $sql="SELECT fanID, firstName, lastName, age FROM RootsFor NATURAL JOIN School NATURAL JOIN Fans WHERE sid='6'";
   $result = mysqli_query($con,$sql);
    if (!$result)
    {
        die('Error: ' . mysqli_error($con));
    }

    if ($result->num_rows > 0)
    {
        // $row = mysqli_fetch_row($result);
        echo "<html><table border=1 frame=void rules=rows style='width:100%; text-align:left'>";
        echo "<tr>";
        echo("<th>Fan ID</th>");
        echo("<th>First Name</th>");
        echo("<th>Last Name</th>");
        echo("<th>Age</th>");
        echo "</tr>";
        for ($i = 0; $i < $result->num_rows; $i++){
            $row = mysqli_fetch_row($result);
            echo "<tr>";
            for ($j = 0; $j < 4; $j++){
                echo("<td>"
                    .$row[$j]
                    ."</td>"
                    );
            }
        }
        echo "</tr></table></html>";
    }
    else {
        echo "No fans found";
    }


   mysqli_close($con);
?>