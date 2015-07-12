<?php

include('data_con.php');
include('header.php');

// Bacnkend for dealing with temporary reports
$tmp_id=$_POST['tmp_id'];

$choice=$_POST['myb'];

if($choice=="Accept")
{



	$sql = "SELECT * FROM tmp_reports where tmp_id=$tmp_id";
	$result = $conn->query($sql);
	$row=$result->fetch_assoc();
	$s_id=$_POST['s_id'];
	$date=$row['date'];$site_preparation=$row['site_preparation'];$brick_walls=$row['brick_walls'];$carpentry=$row['carpentry'];$paint=$row['paint'];
	$electric_work=$row['electric_work'];$url=$row['url'];
	$sql="insert into reports(`s_id`,`date`,`site_preparation`,`brick_walls`,`carpentry`,`paint`,`electric_work`,`url` ) values($s_id,'$date',$site_preparation,$brick_walls,$carpentry,$paint,$electric_work,'$url') ";
	$result = $conn->query($sql);
}

//echo $sql;
$sql="delete from tmp_reports where tmp_id = $tmp_id";
$result = $conn->query($sql);

?>

<br><br>
<center>
<h3>The report has been dealt with accordingly</h3>
<br>
<a href="partner.php" class="btn  btn-success">Go Back</a>
<br>

</center>