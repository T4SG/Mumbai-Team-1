<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/checkbox.js"></script>
<script src="js/Chart.js"></script>
<script src="js/table-fixed-header.js"></script>
<script src="js/legend.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap-white.css">
<link rel="stylesheet" type="text/css" href="css/checkbox-bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/table-fixed-header.css">
<link rel="stylesheet" type="text/css" href="css/demo.css">



<?php

if($_SESSION['type']=='partner')
{
	
	?>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="home.php">Home</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li ><a href="partner.php">View Pending Reports</a></li>
					<li><a href="partnerreports.php">View Previous Reports</a></li>
					<li><a href="partnerproblems.php">Add and view Problems</a></li>
					<li><a href="partnerstories.php">Community Stories</a></li>

				</ul>

				<ul class="nav navbar-nav navbar-right">
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
		</div>
	</nav>
<?php
}
?>