<?php
   include_once("./library.php"); // To connect to the database
   $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

   // Check connection
   if (mysqli_connect_errno())
     {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
     }
   // Form the SQL query (an INSERT query)
   $sql="SELECT * FROM School";
   $result = $con->query($sql);
   
   if ($result->num_rows > 0) {
    // output data of each row
    echo "<html><table border=1 frame=void rules=rows style='width:100%; text-align:left'>";
    echo "<tr>";
    echo("<th>School ID</th>");
    echo("<th>School Name</th>");
    echo("<th>School State</th>");
    echo "</tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo("<td>"
            .$row['sid']
            ."</td>"
            );
        echo("<td>"
            .$row['name']
            ."</td>"
            );
        echo("<td>"
            .$row['state']
            ."</td>"
            );
        }
        echo "</tr></table></html>";
    } else {
        echo "No results found";
    }
   mysqli_close($con);
?>