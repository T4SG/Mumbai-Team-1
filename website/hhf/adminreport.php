<?php
session_start();
include('header.php');
include('data_con.php');

?>
<br>


<?php


$school_id=$_POST['s_id'];

$sql = "SELECT * FROM school where s_id=$school_id";
$result = $conn->query($sql);
$row=$result->fetch_assoc();

$school_name=$row['name'];

//fetch all reports for a school
$sql = "SELECT * FROM reports where s_id=$school_id order by r_id ASC";


$result = $conn->query($sql);
?>

<div class="container">
	<br>
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
			$i=1;

			if ($result->num_rows > 0) {
				//display reports

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
						$mini=min($sp,$bw,$carpentry,$paint,$electric_work);
					}


					$i++;
				}

			} 
			// Algorithm to determine estimated completion date..uses linear approximation

			$avg=round($mini/$i);
			$left=100-$mini;
			$estimate=$left/$avg;


			?>
		</tbody>
	</table>
	<br><b>Estimated Months Left for Completion: <?php echo round($estimate); ?></b>
	<br><br>
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
				fillColor: '#8258FA',
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