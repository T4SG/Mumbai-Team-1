<?php
session_start();
include('header.php');

?>




<style type="text/css">

	.item{
		background: #333;    
		text-align: center;
		height: 300px !important;
	}
	.carousel{
		margin-top: 20px;
	}
	.bs-example{
		margin: 20px;
	}
	.row.no-gutter {
		margin-left: 0;
		margin-right: 0;
	}

	.row.no-gutter [class*='col-']:not(:first-child),
	.row.no-gutter [class*='col-']:not(:last-child) {
		padding-right: 0;
		padding-left: 0;
	}

</style>

</head>
<body style="padding:0  15px;">



<div class="row">
	<div class="bs-example">
		<div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
			<!-- Carousel indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>   
			<!-- Wrapper for carousel items -->
			<div class="carousel-inner">
				<div class="active item"> <img src="images/img1.jpg" alt="Chania" style="height:350px;width:100%">
               <!--  <h2>Slide 1</h2>
               <div class="carousel-caption">
                  <h3>First slide label</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->

              </div>
              <div class="item"><img src="images/img2.jpg" alt="Chania" style="height:350px;width:100%">
          <!--      <h2>Slide 2</h2>
                <div class="carousel-caption">
                  <h3>Second slide label</h3>
                  <p>Aliquam sit amet gravida nibh, facilisis gravida odio.</p>
              </div>-->
          </div>
          <div class="item"> <img src="images/img3.jpg" alt="Chania" style="height:350px;width:100%">
            <!--    <h2>Slide 3</h2>
                <div class="carousel-caption">
                  <h3>Third slide label</h3>
                  <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
              </div>-->
          </div>
      </div>
      <!-- Carousel controls -->
      <!-- <a class="carousel-control left" href="#myCarousel" data-slide="prev">-->
      <span class="glyphicon glyphicon-chevron-left"></span>
      <!--   </a>-->
       <!-- <a class="carousel-control right" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>-->
    </div>
</div>

<div class="wrapper container">
	<div class="row">
		<div class="text-center">

			<div class="col-md-4" style="background-color:none"><h3><b>OUR MISSION</b></h3>
				<p>Happy Hearts Fund, founded in 2006 by Petra Nemcova after she survived the 2004 Indian Ocean Tsunami, rebuilds safe-resilient schools in areas impacted by natural disasters

					We work during the gap period when children are forgotten after emergency response is complete.</p>
				</div>
				<div class="col-md-4" style="background-color:none"><h3><b>STORY OF CHANGE</b></h3>
					<p>A student from 16 De Septiembre School in Veracruz, Mexico

						I am 11 years old and I studied at a very poor school with very small rooms.

						Now, thanks to Happy Hearts I have a large school in which we are all delighted. The school is very nice and everyone can study at ease.

						When I grow up, I want to be a doctor because I like to help others. Now, in my new school there are no accidents and classrooms are more spacious and we are more healthy.</p>

					</div>
					<div class="col-md-4" style="background-color:none"><h3><b>REBUILDING AFTER THE SPOTLIGHT</b></h3>
						<p>Happy Hearts Fund rebuilds safe-resilient schools in areas impacted by natural disasters.

							We work during the gap period when children are forgotten after emergency response is complete.</p>
						</div>

					</div>
				</div>     
			</div>
		</div>

		<br>

		<div class="row">
			<ul class="nav nav-pills nav-justified">
				<li class="active"><a href="#">Home</a></li>
				<li class="active"><a>212.488.2602 | 646.417.7268 (F)</a></li>
				<li class="active"><a>P.O Box 725. New York, NY 10014</a></li>
			</ul>
		</div>

	</div>



</div>

</body>