<?php
   include_once("./library.php"); // To connect to the database
   $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

   // Check connection
   if (mysqli_connect_errno())
     {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
     }
   // Form the SQL query (an INSERT query)
   $sql="SELECT * FROM Players WHERE gender='f'";
   $result = $con->query($sql);
   
   if ($result->num_rows > 0) {
    // output data of each row
    echo "<html><table border=1 frame=void rules=rows style='width:100%; text-align:left'>";
    echo "<tr>";
    echo("<th>Player ID</th>");
    echo("<th>First Name</th>");
    echo("<th>Last Name</th>");
    echo("<th>Age</th>");
    echo("<th>Gender</th>");
    echo("<th>Position</th>");
    echo("<th>3pt%</th>");
    echo("<th>FG%</th>");
    echo("<th>FT%</th>");
    echo("<th>Rebounds</th>");
    echo("<th>Steals</th>");
    echo("<th>Blocks</th>");
    echo("<th>Assists</th>");
    echo("<th>Total Points</th>");
    echo "</tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo("<td>"
            .$row['pid']
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
            .$row['position']
            ."</td>"
            );
        echo("<td>"
            .$row['ThreePtPct']
            ."</td>"
            );
        echo("<td>"
            .$row['fgPct']
            ."</td>"
            );
        echo("<td>"
            .$row['ftPct']
            ."</td>"
            );
        echo("<td>"
            .$row['rebounds']
            ."</td>"
            );
        echo("<td>"
            .$row['steals']
            ."</td>"
            );
        echo("<td>"
            .$row['blocks']
            ."</td>"
            );
        echo("<td>"
            .$row['assists']
            ."</td>"
            );
        echo("<td>"
            .$row['pointsPerGame']
            ."</td>"
            );
        }
        echo "</tr></table></html>";
    } else {
        echo "No results found";
    }
   mysqli_close($con);
?>