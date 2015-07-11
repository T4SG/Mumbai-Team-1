<?php

include('data_con.php');
include('header.php');


$s_id=$_POST['s_id'];
$contents=$_POST['prob_desc'];

$priority=$_POST['priority'];

$sql="insert into problems(`s_id`,`contents`,`priority`) values($s_id,'$contents',$priority)";
//echo $sql;
$result = $conn->query($sql);



?>

<center>
<br><br><br>
<h3>Problem Successfully added.!! </h3>
<br>
<a href="partnerproblems.php" class="btn btn-success">Go Back!</a>

</center>