<?php

// Database

require_once('dependencies/parse-env.php');
use DevCoder\DotEnv as E;

try {
		$dotenv = new E();
		$dotenv->load();
}
catch(Exception $exception) {
		echo 'Message: '.$exception->getMessage();
}

$serverName = $_ENV["MYSQLHOST"];
// $userName = $_ENV["MYSQLUSER"];
// $password = $_ENV["MYSQLPASSWORD"];
// $databaseName = $_ENV["MYSQLDATABASE"];


 die($serverName);
// die;
// Create Connection
$conn = new mysqli($serverName,$userName,$password,$databaseName);

if($conn->connect_error)
die("Connection Failed!<br>".$conn->connect_error);
?>