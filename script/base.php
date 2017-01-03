<?php
  // URL of the host
  $dbhost = "localhost"; 
  
  // Name of the database
  $dbname = "series";
  
  // User name
  $dbuser = "anonymous";
  
  // Password (not used here)
  $dbpass = "anonymous";
 
  try {
    $connection = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbuser, $dbpass);
  } catch(PDOException $e) {
    echo $e->getMessage();
  }
?>