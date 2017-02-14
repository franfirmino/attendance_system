<?php

      $username = "2158344_ncieas";
      $password = "Ab381695";
      $host = "fdb13.awardspace.net";
      
$con = mysqli_connect($host,$username,$password,"2158344_ncieas");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
 
?>