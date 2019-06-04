
<?php
	
		include "login.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
  	<title>Book Viewer</title>
</head>

<body>
	 <?php
		include "inc/navbar.php";
	?>


	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1 class="mt-4"></h1>

				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				  <ol class="carousel-indicators">
				    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				  </ol>
				  <div class="carousel-inner">
				    <div class="carousel-item active">
				      <img id="image" class="d-block w-100" src="images/1.jpg" alt="First slide">
				    </div>
				    <div class="carousel-item">
				      <img class="d-block w-100" src="images/2.jpg" alt="Second slide">
				    </div>
				    <div class="carousel-item">
				      <img class="d-block w-100" src="images/3.jpg" alt="Third slide">
				    </div>
				  </div>
				  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>

			</div>
			
		</div>
		<div class="row">
			<div class="col-sm-12">
			<hr />
				    
			</div>
		</div>

	</div>

	<?php
		include "inc/footer.html";
	?>

	<script src="js/jquery-3.3.1.js"></script>
 	<script src="js/bootstrap.js"></script>
 	<script src="js/script.js"></script>
</body>
</html>