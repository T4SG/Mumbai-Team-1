<?php

include('data_con.php');
include('header.php');


$msg_id=$_POST['msg_id'];


$sql="update messages set status=1 where msg_id=$msg_id";//delete msg belonging to an id
$result = $conn->query($sql);

?>