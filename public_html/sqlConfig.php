<?php
  $servername = "mysql.comp.polyu.edu.hk";
  $username = "18029355d";
  $password = "dgpukjje";
  $dbname = "18029355d";
  
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if (!$conn->connect_error) {

  } else {
    die("Fail: " . $conn->connect_error);
  }
  


?>