<?php

include('data_con.php');
include('header.php');


$tmp_id=$_POST['tmp_id'];

$sql = "SELECT * FROM tmp_reports where tmp_id=$tmp_id";
$result = $conn->query($sql);
$row=$result->fetch_assoc();
$s_id=$_POST['s_id'];
$date=$row['date'];$site_preparation=$row['site_preparation'];$brick_walls=$row['brick_walls'];$carpentry=$row['carpentry'];$paint=$row['paint'];
$electric_work=$row['electric_work'];
$sql="insert into reports(`s_id`,`date`,`site_preparation`,`brick_walls`,`carpentry`,`paint`,`electric_work` ) values($s_id,'$date',$site_preparation,$brick_walls,$carpentry,$paint,$electric_work) ";
$result = $conn->query($sql);

echo $sql;
$sql="delete from tmp_reports where tmp_id = $tmp_id";
$result = $conn->query($sql);

?>