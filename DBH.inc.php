<?php


$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "bugtracker";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if(!$conn)
{
	die("Failed to connect to database: " . mysqli_connect_error());
}