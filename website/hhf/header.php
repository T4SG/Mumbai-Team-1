<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/checkbox.js"></script>
<script src="js/Chart.js"></script>
<script src="js/table-fixed-header.js"></script>
<script src="js/legend.js"></script>
<script src="js/liquid.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap-white.css">
<link rel="stylesheet" type="text/css" href="css/checkbox-bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/table-fixed-header.css">
<link rel="stylesheet" type="text/css" href="css/demo.css">



<?php

//Generate relevant Nav Bars  depending on user type.

if(isset($_SESSION['type']))
{
	if($_SESSION['type']=='partner')
	{



		echo('
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="partnerhome.php">Partner Home</a>
					</div>

					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li ><a href="partner.php">View Pending Reports</a></li>
							<li><a href="partnerreports.php">View Previous Reports</a></li>
							<li><a href="partnerproblems.php">Add and view Problems</a></li>
							<li><a href="partnermessages.php">View all Messages</a></li>
							<li><a href="partnerstories.php">Community Stories</a></li>

						</ul>


						<ul class="nav navbar-nav navbar-right">
							<li><a href="logout.php" class="btn btn-info  ">Logout</a></li>
						</ul>
					</div>
				</div>
			</nav>');
}

if($_SESSION['type']=='admin')
{
	echo('
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="adminhome.php">Admin Home</a>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">



					<ul class="nav navbar-nav navbar-right">
						<li><a href="logout.php" class="btn btn-success  ">Logout</a></li>
					</ul>
				</div>
			</div>
		</nav>');
}

}
else
{
	echo('
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php">Home</a>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">



					<ul class="nav navbar-nav navbar-right">
						<li><a href="login.php" class="btn btn-success  ">Login</a></li>
					</ul>
				</div>
			</div>
		</nav>');
}
?>