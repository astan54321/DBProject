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

  // SELECT Query for username
  $sql = "INSERT INTO Fans (fanID, firstName, lastName, age, gender)
  VALUES
  ('$_POST[fid]','$_POST[fname]','$_POST[lname]','$_POST[age]','$_POST[gender]')";

  if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }

  $sql = "INSERT INTO RootsFor (fanID, sid, pid)
  VALUES
  ('$_POST[fid]','$_POST[team]', NULL)";

  if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
 
  header("Location: ./");

mysqli_close($con);
?>