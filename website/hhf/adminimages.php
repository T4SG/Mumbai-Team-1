<?php
session_start();
include('header.php');
include('data_con.php');

?>
<center>
	<div class="container">
		<br><br>
		<h3>Recent Images:</h3>
		<br><br><br>

		<?php

		$school_id=$_POST['s_id'];

		$sql = "SELECT * FROM reports where s_id=$school_id order by r_id desc limit 1";
		$result = $conn->query($sql);


		if ($result->num_rows > 0) {


			$row = $result->fetch_assoc();
			$url=$row['url'];

			//echo("<img src=images/$url class=img-responsive><br>");

		}


		else
		{
			echo ('Sorry! No images available for this school!');
		}
		?>


	</div>
	<br><br>

	<style> 
		img.new_ani {

			
			
			-webkit-animation-name: example; /* Chrome, Safari, Opera */
			-webkit-animation-duration: 6s; /* Chrome, Safari, Opera */
			animation-name: example;
			animation-duration: 6s;
		}

		/* Chrome, Safari, Opera */
		@-webkit-keyframes example {
			0%   {left:0px; top:200px;}
			100%  { left:450px; top:200px;}

		}

		/* Standard syntax */
		@keyframes example {
			0%   { left:0px; top:200px;}
			100%  {left:450px; top:200px;opacity:0.2;}

		}
	</style>
</head>
<body>


	<img class="new_ani" src=images/<?php echo $url; ?>  style="position:absolute;
	left:450px;
	top:200px;">
	<img src=images/school.jpg class="img-responsive" style="position:absolute;
	left:450px;
	top:200px;z-index:-1;">
</center>
</div>

