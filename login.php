<?php
   include_once("./library.php"); // To connect to the database
   $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

   // Check connection
   if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
   // Form the SQL query (an INSERT query)
   $sql="INSERT INTO Login (username, password)
   VALUES
   ('$_POST[uname]','$_POST[psw]')";
   
   if (!mysqli_query($con,$sql))
     {
     die('Error: ' . mysqli_error($con));
     }
    
     header("Location: ./");

   mysqli_close($con);
?>