<?php

// Database

$fileName = !isset($_GET["id"]) ? "./credentials.txt" : "../credentials.txt";

try {
	$credFile = fopen($fileName, "r") or die("Unable to open the file.");
	$credFileData = explode(' ', fread($credFile, filesize($fileName)));	
} 
catch(Exception $exception) {
	echo 'Message: '.$exception->getMessage();
}
finally {
	fclose($credFile);
}



$serverName = $credFileData[0];
$userName = $credFileData[1];
$password = $credFileData[2];
$databaseName = $credFileData[3];

// Create Connection
$conn = new mysqli($serverName,$userName,$password,$databaseName);

if($conn->connect_error)
die("Connection Failed!<br>".$conn->connect_error);
?>