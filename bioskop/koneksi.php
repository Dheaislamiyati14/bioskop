<?php
   $host = "localhost";
   $user = "root";
   $password = "";
   $database = "bioskopdb";

   $mysqli = mysqli_connect($host, $user, $password, $database);

   if (mysqli_connect_errno()) {
      echo "<h2>Gagal koneksi ke Database</h2>";
   } else {
      echo "<h2>Koneksi ke Database Berhasil</h2>";
   }

?>
