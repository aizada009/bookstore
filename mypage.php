<?php
include 'inc/connection.php';
include 'login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
	<title>Добро пожаловать на мой блог</title>
</head>
<body>
	
	<div class="wrap">
	
	<?php
		include "inc/navbar.php";
	?>
		<div class="container">
			<div class="row">
				
				<div class="col-sm-4 mt-4">
					<div class="card mt-4">
					  <div class="card-body ">
			  	<?php
			  		if($loggedIn) {
			  	?>
						<span>Здравствуйте, <?= $_SESSION['username']; ?></span>
						<hr>
						<form action="index.php" method="POST">
							<input type="hidden" name="logout">
							<button class="btn btn-info" type="submit">Выйти</button>
						</form>
			  	<?php
			  		} 
			  	?>
						
					  </div>
					</div>

					
				</div>
			</div>
		</div>
	
	<?php
		include "inc/footer.html";
	?>

	</div>
    
	<div class="to-top">
		<a href="#" class="to-top-button">&uArr;</a>
	</div>

</body>
</html>