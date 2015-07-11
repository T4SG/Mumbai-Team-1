<?php
session_start();
include('header.php');
include('data_con.php');

?>
<script>

	$(function() {
		$('form#myform').on('submit', function(e) {
			$(this).find('input[type="submit"]').prop("disabled", true);
			
			$.post('updatepartnerproblems.php', $(this).serialize(), function (data) {
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

$sql = "SELECT * FROM problems where s_id=$school_id order by priority desc";
$result = $conn->query($sql);


?>

<center>
	<div class="container">
		<h2>Current Problems:</h2>

		<br>
		<table  class="table table-bg table-bordered text-center table-fixed" border="2" >
			<thead >
				<tr class="active">
					<td>Problem Details</td>
					<td>Priority</td>
					<td>Action</td>
				</tr>
			</thead>
			<tbody>


				<?php

				$sql = "SELECT * FROM problems where s_id=$school_id order by priority desc";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {

					while($row = $result->fetch_assoc()) {
						echo('<tr>');					
						echo('<form method="post" id="myform" onsubmit="myb.disabled = true; return true;">');
					//echo ('<form method="post" action="updatepartner.php">');
						echo("<input type=hidden name=prob_id value=".$row['prob_id'].">");
						echo("<input type=hidden name=s_id value=".$school_id.">");
						echo('<td>'.$row['contents'].'</td>');
						echo('<td>'.$row['priority'].'</td>');
						echo('<td>'.'<button type="submit" class="btn btn-success" name="myb" value="Update">Mark as solved!</button>'.'</td>');

						echo('</form>');
						echo('</tr>');

					}

				} 
				?>
			</tbody>
		</table>


		<br><br>

		<h2>Add a problem:</h2>
		
		<div style="width:50%;">
			<form method="post" action="addproblem.php" class="form-horizontal">
				<div class="form-group">
					<label for="textArea" class="control-label">Description:</label>
					<div class="">
						<textarea class="form-control" rows="4" id="textArea" name="prob_desc" placeholder="Enter problem description." required></textarea>
						<span class="help-block"></span>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail" class="control-label">Priority:</label>
					<div>
						<input type="number" min="1" max="10" class="form-control" name="priority" placeholder="Enter priority between 1 to 10."required>
					</div>
				</div>
				<?php echo("<input type=hidden name=s_id value=".$school_id.">"); ?>
				<input type="submit" class="btn btn-warning" value="Submit">
			</form>
		</div>
	</div>
</center>
