<?php
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 

// Define connection parameters..
$servername = 'localhost';
$username = 'root';
$password = 'root';
$dbname = 'test';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

?>
