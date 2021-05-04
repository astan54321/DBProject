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
  $getPass = "SELECT password FROM Login WHERE username='$_POST[uname]'";
  $pass = mysqli_query($con,$getPass);
  if (!$pass)
  {
    die('Error: ' . mysqli_error($con));
  }
  if ($pass->num_rows > 0)
  {
    $password = mysqli_fetch_row($pass)[0];
    printf("got here pass from db: %s, pass from input: %s\n", $password, $_POST[psw]);
    // means user exist
    if ($_POST[psw] == $password)
    {
      printf("password is correct\n");
      // password correct
      header("Location: ./");
    }
    else 
    {
      // password incorrect
      header("Location: ./login.html");
    }
  } 
  else {
    // Form the SQL query (an INSERT query)
  //  $sql="INSERT INTO Login (username, password)
  //  VALUES
  //  ('$_POST[uname]','$_POST[psw]')";
   
  //  if (!mysqli_query($con,$sql))
  //    {
  //    die('Error: ' . mysqli_error($con));
  //    }
  //    header("Location: ./");
  header("Location: ./login.html");
  }  

   mysqli_close($con);
?>