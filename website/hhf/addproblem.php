<?php

include('data_con.php');
include('header.php');


$s_id=$_POST['s_id'];//get school id
$contents=$_POST['prob_desc']; //get problem content

$priority=$_POST['priority']; //get priority

$sql="insert into problems(`s_id`,`contents`,`priority`) values($s_id,'$contents',$priority)";  //update database
//echo $sql;
$result = $conn->query($sql);



?>

<center>
<br><br><br>
<h3>Problem Successfully added.!! </h3>
<br>
<a href="partnerproblems.php" class="btn btn-success">Go Back!</a>

</center>