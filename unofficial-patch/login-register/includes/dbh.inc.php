<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "survey";

// Connection
$conn = mysqli_connect($serverName,
               $dbUsername, $dbPassword, $dbName);
 
// Check if connection is
// Successful or not
if (!$conn) {
  die("Connection failed: ". mysqli_connect_error());
}
echo "Connected successfully";
?>