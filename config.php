<?php

// db
$database = 'lojadb';
$servername = 'localhost';
$username = 'root';
$password = 'newtab123';


$conn = mysqli_connect($servername, $username, $password, $database);

if($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}





