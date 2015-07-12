<?php
session_start();
include('header.php');
include('data_con.php');

// Home page for partner

$partner_id=$_SESSION['u_id'];

$sql = "SELECT s_id FROM school where p_id=$partner_id";
$result = $conn->query($sql);
$row=$result->fetch_assoc();

$school_id=$row['s_id'];
?>
<br><br>
<center>


	<br>
	<br>
	<div class="container">
		<h2>Unread Messages: </h2>
		<table  class="table table-bg table-bordered text-center table-fixed" border="2" >
			<thead >
				<tr class="active">
					<td>Date</td>
					<td>Message Details</td>
					<td>Priority</td>

				</tr>
			</thead>
			<tbody>
				<?php

				$sql="select * from messages where status=0 AND s_id=$school_id";  // get unread messages
				$result = $conn->query($sql);


				if ($result->num_rows > 0) {

					while($row = $result->fetch_assoc()) {


						echo('<tr>');
						echo('<td>'.$row['date'].'</td>');
						echo('<td>'.$row['contents'].'</td>');
						echo('<td><a href=partnermessages.php class="btn btn-success">View</a></td>');


					}

				} 


				?>
			</tbody>
		</table>
	</div>

</center>