<?php
session_start();
include('header.php');
include('data_con.php');

?>
<center>
	<div class="container">
	<br><br>

		<?php

		$partner_id=$_SESSION['u_id'];

		$sql = "SELECT s_id FROM school where p_id=$partner_id";
		$result = $conn->query($sql);
		$row=$result->fetch_assoc();

		$school_id=$row['s_id'];

		$sql = "SELECT * FROM stories where s_id=$school_id ";
		$result = $conn->query($sql);


		if ($result->num_rows > 0) {

			while($row = $result->fetch_assoc()) {

				$contents=$row['contents'];

				echo('<div class="well"><h3>Community Stories:</h3>');
				echo('<h4>Here is what we have  to say:</h4>');
				echo ('<div class=row><div class=col-md-6><br><br>');
				echo($contents);
				echo('</div>');

				$sql2="SELECT * from images where st_id=".$row['st_id'];
				
				$result2=$conn->query($sql2);

				while($row2 = $result2->fetch_assoc()) {
					echo('<br><br>');
					echo("<div class=col-md-6><img class=img-responsive src=images/".$row2['url']."></div>");
				}
				echo ('</div>');
				echo('</div><br>');


			}

		} 
		else
		{
			echo ('Sorry! No stories available for this school!');
		}
		?>


	</div>
</center>
</div>

