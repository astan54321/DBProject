<?php
   include_once("./library.php"); // To connect to the database
   $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

   // Check connection
   if (mysqli_connect_errno())
     {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
     }
   // Form the SQL query (an INSERT query)
   $sql="SELECT * FROM Coach";
   $result = $con->query($sql);
   
   if ($result->num_rows > 0) {
    // output data of each row
    echo "<html><table border=1 frame=void rules=rows style='width:100%; text-align:left'>";
    echo "<tr>";
    echo("<th>Coach ID</th>");
    echo("<th>First Name</th>");
    echo("<th>Last Name</th>");
    echo("<th>Age</th>");
    echo("<th>Gender</th>");
    echo("<th>Wins</th>");
    echo("<th>Losses</th>");
    echo "</tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo("<td>"
            .$row['cid']
            ."</td>"
            );
        echo("<td>"
            .$row['firstName']
            ."</td>"
            );
        echo("<td>"
            .$row['lastName']
            ."</td>"
            );
        echo("<td>"
            .$row['age']
            ."</td>"
            );
        echo("<td>"
            .$row['gender']
            ."</td>"
            );
        echo("<td>"
            .$row['wins']
            ."</td>"
            );
        echo("<td>"
            .$row['losses']
            ."</td>"
            );
        }
        echo "</tr></table></html>";
    } else {
        echo "No results found";
    }
   mysqli_close($con);
?>