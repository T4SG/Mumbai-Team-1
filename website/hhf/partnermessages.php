<?php
session_start();
include('header.php');
include('data_con.php');

?>
<script>

	$(function() {
		$('form#myform').on('submit', function(e) {
			$(this).find('input[type="submit"]').prop("disabled", true);
			
			$.post('deletemessage.php', $(this).serialize(), function (data) {
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
		<h2>All Messages:</h2>

		<br>
		<table  class="table table-bg table-bordered text-center table-fixed" border="2" >
			<thead >
				<tr class="active">
					<td>Date</td>
					<td>Message Details</td>
					<td>Action</td>
				</tr>
			</thead>
			<tbody>


				<?php

				$sql = "SELECT * FROM messages where s_id=$school_id order by status";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {

					while($row = $result->fetch_assoc()) {
						echo('<tr>');					
						echo('<form method="post" id="myform" onsubmit="myb.disabled = true; return true;">');
						echo("<input type=hidden name=msg_id value=".$row['msg_id'].">");
						echo('<td>'.$row['date'].'</td>');
						echo('<td>'.$row['contents'].'</td>');
						if($row['status']==0)
							echo('<td>'.'<button type="submit" class="btn btn-success" name="myb" value="Update">Mark as read!</button>'.'</td>');
						else
							echo('<td>Already Read</td>');

						echo('</form>');
						echo('</tr>');

					}
					echo('</tbody></table>');

				} 
				else
				{
					echo('</tbody></table>');
					echo ('No messages');
				}
				?>



				<br><br>

			</div>
		</center>
