<?php

$host = "127.0.0.1";
$user = "root";
$password = "";
$database = "User";

// Connect to MySQL Database 
$mysqli = new mysqli($host, $user, $password,$database);

/* check connection */
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} 
?>