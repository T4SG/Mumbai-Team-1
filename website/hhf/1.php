<?php
ob_start();
session_start();
include('data_con.php'); //include database connection
error_reporting(0);


$sql = "SELECT * FROM users ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

	while($row = $result->fetch_assoc()) {
		
		echo $row['id'];
		echo  '<br>';
		echo $row['names'];
	}

} 
