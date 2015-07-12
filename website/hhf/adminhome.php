<?php
session_start();
include('header.php');
include('data_con.php');


//Home page for the Admin Dashboard
?>


<br><br>
<center>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<form method="post" class="form-horizontal" >
					<div class="form-group">
						<label for="select" class="control-label" name="s_id" required>Select the school:</label>
						<div class="">
							<select class="form-control" id="select" name="s_id">
								<?php

								$sql = "SELECT * FROM school";  //gather all schools

								$result = $conn->query($sql);



								if ($result->num_rows > 0) {

									while($row = $result->fetch_assoc()) {
										echo ("<option value=".$row['s_id'].">".$row['name']."</option>");

									}

								} 
								?>
							</select>
						</div>
					</div>
					<!-- Add relevant form submission hyperlinks -->
					<input type="submit" class="btn btn-success" value="View Reports" onclick="form.action='adminreport.php';">
					<input type="submit" class="btn btn-danger" value="View Problems" onclick="form.action='adminproblems.php';">
					<input type="submit" class="btn btn-warning" value="View Stories" onclick="form.action='adminstories.php';">
					<input type="submit" class="btn btn-info" value="Send Messages" onclick="form.action='adminmessages.php';">
					<br><br>
					<input type="submit" class="btn btn-success" value="Generate report for Donor" onclick="form.action='donor.php';">
				
					<input type="submit" class="btn btn-info" value="View Recent Images" onclick="form.action='adminimages.php';">
				</form>
			</div>
		</div>
	</div>

	<br>
	<br>
	<div class="container">
		<h2>Problems needing immediate  attention: </h2>
		<table  class="table table-bg table-bordered text-center table-fixed" border="2" >
			<thead >
				<tr class="active">
					<td>School Name</td>
					<td>Problem Details</td>
					<td>Priority</td>

				</tr>
			</thead>
			<tbody>
				<?php

				$sql="select * from problems where priority >= 8 order by priority desc";  // sort problems by priority , 8 can be adjusted
				$result = $conn->query($sql);


				if ($result->num_rows > 0) {

					while($row = $result->fetch_assoc()) {
						$sc_id=$row['s_id'];
						$sql2="select * from school where s_id=$sc_id";
						$result2=$conn->query($sql2);
						$row2 = $result2->fetch_assoc();
						$sc_name=$row2['name'];

						echo('<tr>');
						echo("<td>$sc_name</td>");
						echo('<td>'.$row['contents'].'</td>');
						echo('<td>'.$row['priority'].'</td>'); // display contents of problem


					}

				} 


				?>
			</tbody>
		</table>
	</div>

</center>