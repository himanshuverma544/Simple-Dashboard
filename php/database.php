<?php

// Database

try {
		$serverName = getenv("DB_SERVER_NAME");
		$userName = getenv("DB_USERNAME");
		$password = getenv("DB_PASSWORD");
		$databaseName = getenv("DB_NAME");
}
catch(Exception $exception) {
		echo 'Message: '.$exception->getMessage();
}
finally {
		die('Issue with Environment Variables.');
}

// Create Connection
$conn = new mysqli($serverName,$userName,$password,$databaseName);

if($conn->connect_error)
die("Connection Failed!<br>".$conn->connect_error);
?>