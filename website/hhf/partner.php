<?php
session_start();
include('header.php');
include('data_con.php');

?>
<br><br><br>
<script>

	$(function() {
		$('form#myform').on('submit', function(e) {
			$(this).find('input[type="submit"]').prop("disabled", true);
			
			$.post('updatepartner.php', $(this).serialize(), function (data) {
            // This is executed when the call to update.php was succesful.  
           // alert('Done');

       }).error(function() {
            // This is executed when the call to mail.php failed.
            alert('Error. Refresh page and try again.');
        });
       e.preventDefault();
   });
	});


</script>

<?php

$partner_id=$_SESSION['u_id'];

$sql = "SELECT s_id FROM school where p_id=$partner_id";
$result = $conn->query($sql);
$row=$result->fetch_assoc();

$school_id=$row['s_id'];

$sql = "SELECT * FROM tmp_reports where s_id=$school_id";


$result = $conn->query($sql);
?>

<div class="container">

	<table  class="table table-bg table-bordered text-center table-fixed" border="2" >
		<thead >
			<tr class="active">
				<td>Date</td>
				<td>Site Preparation</td>
				<td>Brick Walls</td>
				<td>Carpentry</td>
				<td>Paint</td>
				<td>Electric Work</td>
				<td>Action</td>
			</tr>
		</thead>
		<tbody>

			<?php

			if ($result->num_rows > 0) {

				while($row = $result->fetch_assoc()) {
					echo('<tr>');					
					echo('<form method="post" id="myform" onsubmit="myb.disabled = true; return true;">');
					//echo ('<form method="post" action="updatepartner.php">');
					echo("<input type=hidden name=tmp_id value=".$row['tmp_id'].">");
					echo("<input type=hidden name=s_id value=".$school_id.">");
					echo('<td>'.$row['date'].'</td>');
					echo('<td>'.$row['site_preparation'].'%</td>');
					echo('<td>'.$row['brick_walls'].'%</td>');
					echo('<td>'.$row['carpentry'].'%</td>');
					echo('<td>'.$row['paint'].'%</td>');
					echo('<td>'.$row['electric_work'].'%</td>');
					echo('<td>'.'<button type="submit" class="btn btn-info" name="myb" value="Update">Update</button>'.'</td>');
					
					echo('</form>');
					echo('</tr>');

				}

			} 
			?>

		</tbody>
	</table>
</div>