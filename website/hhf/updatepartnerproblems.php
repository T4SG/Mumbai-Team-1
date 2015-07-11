<?php

include('data_con.php');
include('header.php');


$prob_id=$_POST['prob_id'];


$sql="delete from problems where prob_id = $prob_id";
$result = $conn->query($sql);

?>