<?php
// Database configuration
$hostname = "localhost"; 
$username = "root"; 
$password = "Enya_system"; 
$database = "bincom_test"; 

// Establish database connection
$connection = mysqli_connect($hostname, $username, $password, $database);

// Check if the connection was successful
if (!$connection) {
  die("Database connection failed: " . mysqli_connect_error());
}
?>
