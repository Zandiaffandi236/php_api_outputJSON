<?php
    $host = "localhost"; //host database
    $username = "root";  //username database
    $password = "";
    $database ="php-api";
    

    $koneksi = mysqli_connect ($host, $username, $password, $database);
    if($koneksi->connect_error){
        die("Connection failed: " . $koneksi->connect_error);
      }
      echo "";
      

    
?>