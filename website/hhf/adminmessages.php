<?php
session_start();
include('header.php');
include('data_con.php');

if(isset($_POST['submitted']))
{

	$s_id=$_POST['s_id'];
	$contents=$_POST['msg_desc'];

	date_default_timezone_set('Asia/Kolkata');
	$date=date('d/m/Y');

	$sql="insert into messages(`s_id`,`contents`,`status`,`date`) values ($s_id,'$contents',0,'$date')"; //0 means unread
	//echo $sql;
	$result=$conn->query($sql);

	echo('<div class="alert alert-dismissible alert-success">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Your message has been sent!</strong>
	</div>');
	
}

?>
<center>
	<div class="container">
		<br><br>

		<?php

		$school_id=$_POST['s_id'];

		$sql = "SELECT * FROM school where s_id=$school_id";
		$result = $conn->query($sql);
		$row=$result->fetch_assoc();

		$school_name=$row['name'];

		?>

		<div style="width:50%;">

			<h2>Send messsage to school:<?php echo $school_name;?> </h2>


			<form method="post" action="adminmessages.php" >

				<input  type="hidden" name="s_id" value=<?php echo $school_id ?> >
				<input  type="hidden" name="submitted" value="1">
				<div class="form-group">
					<label for="textArea" class="control-label">Message Description:</label>
					<div class="">
						<textarea class="form-control" rows="4" id="textArea" name="msg_desc" placeholder="Enter message to be sent." required></textarea>
						
					</div>
				</div>
				<input type="submit" class="btn btn-warning" value="Send Message">
			</form>

		</div>
	</div>
</center>
</div>

