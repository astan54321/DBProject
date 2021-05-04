<?php
    include_once("./library.php"); // To connect to the database
    // $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
    $con = $userCon;

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    // Check connection
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    // Form the SQL query (an INSERT query)
    $sql="SELECT * FROM Players WHERE firstName LIKE '$_POST[search]%'";
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
        echo("<th>PPG</th>");
        echo "</tr>";
        for ($i = 0; $i < $result->num_rows; $i++){
            $row = mysqli_fetch_row($result);
            echo "<tr>";
            for ($j = 0; $j < 14; $j++){
                echo("<td>"
                    .$row[$j]
                    ."</td>"
                    );
            }
        }
        echo "</tr></table></html>";
    }
    else {
        echo "No players found";
    }

    mysqli_close($con);
?>