<?php
   $host = "localhost";
   $user = "root";
   $pass = "";
   $db = "bioskopDB";

   $mysqli = mysqli_connect($host, $user, $pass, $db);

   if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   } else {
      // echo "Successfully connected to MySQL: " . mysqli_get_host_info($mysqli);
   }

?>
