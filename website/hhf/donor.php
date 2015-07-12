<?php
session_start();
include('header.php');
include('data_con.php');

// Generate relevant details for the donors depending on the school
?>
<br>
<style>
	.quote-container {

		margin-top: 10px;

		position: relative;

	}



	.note {

		color: #333;

		position: relative;

		width: 150px;
		height: 150px;

		margin: 0 auto;

		padding: 20px;

		font-family: Satisfy;

		font-size: 15px;

		box-shadow: 0 10px 10px 2px rgba(0,0,0,0.3);

	}



	.note .author {

		display: block;

		margin: 10px 0 0 0;

		text-align: right;

	}
	.yellow {

		background: rgba(255,119,1,0.57);

		-webkit-transform: rotate(2deg);

		-moz-transform: rotate(2deg);

		-o-transform: rotate(2deg);

		-ms-transform: rotate(2deg);

		transform: rotate(2deg);

	}

</style>

<script>

	$(function() {
		$('form#myform').on('submit', function(e) {
			$(this).find('input[type="submit"]').prop("disabled", true);
			
			$.post('updatelikes.php', $(this).serialize(), function (data) {
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


$school_id=$_POST['s_id'];

$sql = "SELECT * FROM school where s_id=$school_id";
$result = $conn->query($sql);
$row=$result->fetch_assoc();

$school_name=$row['name'];


$sql = "SELECT * FROM reports where s_id=$school_id order by r_id ASC";


$result = $conn->query($sql);
?>
<center>
	<div class="container">
		<h2>Current Progress</h2>

		<div class="row">
			<br>
			<div class="col-md-7">
				<center><h3><?php echo $school_name; ?>: Reports</h3></center>

				<table  class="table table-bg table-bordered text-center table-fixed" border="2" >
					<thead >
						<tr class="active">
							<td>Sr. No. </td>
							<td>Date</td>
							<td>Site Preparation</td>
							<td>Brick Walls</td>
							<td>Carpentry</td>
							<td>Paint</td>
							<td>Electric Work</td>

						</tr>
					</thead>
					<tbody>

						<?php

						if ($result->num_rows > 0) {
							$i=1;

							while($row = $result->fetch_assoc()) {
								echo('<tr>');	
								echo ("<td>$i</td>");				
								echo('<td>'.$row['date'].'</td>');
								echo('<td>'.$row['site_preparation'].'%</td>');
								echo('<td>'.$row['brick_walls'].'%</td>');
								echo('<td>'.$row['carpentry'].'%</td>');
								echo('<td>'.$row['paint'].'%</td>');
								echo('<td>'.$row['electric_work'].'%</td>');
								echo('</tr>');

								if($i==1)
								{
									$sp=$row['site_preparation'];
									$bw=$row['brick_walls'];
									$carpentry=$row['carpentry'];
									$paint=$row['paint'];
									$electric_work=$row['electric_work'];
								}

								$i++;
							}

						} 
						?>
					</tbody>
				</table>
				<br>

				<div class="quote-container">

					<i class="pin"></i>

					<blockquote class="note yellow">

						Happy Hearts Count: 150 students and counting!!

						<cite class="author"></cite>

					</blockquote>

				</div>

			</div>
			<div class="col-md-5">

				<center>
					<h3>Percent Complete for: <?php echo $school_name; ?></h3>
					<canvas id="clients" width="500" height="400"></canvas> 
				</center>
				<script>
					var barData = {
						labels: ['Site Preparation', 'Brick Walls', 'Carpentry', 'Paint', 'Electric Work'],
						datasets: [
						{
							label: '-',
							fillColor: '#8258FD',
							data: [<?php echo("$sp,$bw,$carpentry,$paint,$electric_work");?>]
						}
						]
					};

					var context = document.getElementById('clients').getContext('2d');
					var clientsChart = new Chart(context).Bar(barData,{
						scaleOverride : true,
						scaleSteps : 10,
						scaleStepWidth : 10,
						scaleStartValue : 0 
					});
				</script>
			</div>
		</div>
		<br><br>
		<?php
		$school_name=$row['name'];

		$sql = "SELECT * FROM stories where s_id=$school_id ";
		$result = $conn->query($sql);


		if ($result->num_rows > 0) {

			while($row = $result->fetch_assoc()) {

				$contents=$row['contents'];

				echo('<div class="well"><h3>Community Stories:</h3>');
				echo('<h4>Here is what we have  to say:</h4>');
				echo ('<div class=row><div class=col-md-6 align=left><br><br>');
				echo($contents);

				//implement like feature for stories
				echo('<br><br><form method="post" id="myform" onsubmit="myb.disabled = true; return true;">');
				echo("<input type=hidden name=st_id value=".$row['st_id'].">");
				echo('<td>'.'<button type="submit" class="btn btn-success" name="myb" value="Accept">Like Story!</button>'.'</td>');

				echo('</form>');
				echo('<br>Total Likes: '.$row['likes']);
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

		<br><br>
		<h2>Results:</h2>
		<div class="jumbotron">
			<br>
			<h2>RESULTS 2006-TODAY</h2>
			<h3>
				GLOBALLY, HHF IS ACTIVE IN 9 COUNTRIES AND HAS
				BUILT/REBUILT 116 SCHOOLS AND KINDERGARTENS.
				SINCE INCEPTION, OUR PROGRAMS HAVE BENEFITED
				MORE THAN 50,000 CHILDREN AND 500,000
				COMMUNITY MEMBERS.
			</h3>
		</div>
		<br>
		<img class="img-responsive" src="images/logo.jpg">
		<br>
		<br>



	</div>

</div>
</center>