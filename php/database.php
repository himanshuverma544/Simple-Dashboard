<?php

// Database
$serverName = getenv("MYSQLHOST");
$userName = getenv("MYSQLUSER");
$password = getenv("MYSQLPASSWORD");
$databaseName = getenv("MYSQLDATABASE");

// Create Connection
$conn = new mysqli($serverName,$userName,$password,$databaseName);

if($conn->connect_error)
die("Connection Failed!<br>".$conn->connect_error);
?>