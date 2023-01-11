<?php
require_once('dependencies/parse-env.php');
use DevCoder\DotEnv;

// Keeping it in "try-catch block" for making it run on the local, staging and production.
try {
		$dotenv = new DotEnv();
		$dotenv->load();
}
catch(Exception $exception) {}

$serverName = $_ENV["MYSQLHOST"];
$userName = $_ENV["MYSQLUSER"];
$password = $_ENV["MYSQLPASSWORD"];
$databaseName = $_ENV["MYSQLDATABASE"];


// echo "$serverName - $userName - $password - $databaseName";


// Create Connection

try {
	$conn = new mysqli($serverName, $userName, $password, $databaseName);
}
catch(Exception $e) {
	echo 'Message: '.$e->getMessage();
	die('died in catch');
}
finally{
	die('In finally');
}


if($conn->connect_error)
die("Connection Failed!<br>".$conn->connect_error);
?>