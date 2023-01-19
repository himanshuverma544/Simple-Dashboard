<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/dependencies/parse-env.php';

use DevCoder\DotEnv as TheDotEnv;

try {

    $dotenv = new TheDotEnv();

    $dotenv->load();

} catch (Exception $exception) {}

$serverName = $_ENV["MYSQLHOST"];

$userName = $_ENV["MYSQLUSER"];

$password = $_ENV["MYSQLPASSWORD"];

$databaseName = $_ENV["MYSQLDATABASE"];

$port = $_ENV["MYSQLPORT"];

$conn = new mysqli($serverName, $userName, $password, $databaseName, $port);

if ($conn->connect_error) {
    die("Connection Failed!<br>" . $conn->connect_error);
}
