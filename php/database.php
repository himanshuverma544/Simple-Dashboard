<?php

// Database
declare(strict_types=1);
require_once('vendor/autoload.php');
$project_dir_path = str_replace("\php", "", __DIR__);

try {
		$dotenv = Dotenv\Dotenv::createImmutable($project_dir_path);
		$dotenv->load();
}
catch(Exception $exception) {
		echo 'Message: '.$exception->getMessage();
}

$serverName = $_ENV["MYSQLHOST"];
$userName = $_ENV["MYSQLUSER"];
$password = $_ENV["MYSQLPASSWORD"];
$databaseName = $_ENV["MYSQLDATABASE"];

// Create Connection
$conn = new mysqli($serverName,$userName,$password,$databaseName);

if($conn->connect_error)
die("Connection Failed!<br>".$conn->connect_error);
?>