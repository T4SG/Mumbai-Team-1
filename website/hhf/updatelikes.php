<?php

include('data_con.php');
include('header.php');


$st_id=$_POST['st_id'];


$sql = "update stories set likes=likes+1 where st_id=$st_id";
$result = $conn->query($sql);


?>


