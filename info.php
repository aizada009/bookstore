<?php
include "inc/connection.php";
include "login.php";

if(isset($_GET['type']) && !empty($_GET['type'])){
	$type= $_GET['type'];
}
if(isset($_GET['message']) && !empty($_GET['message'])){
	$message= $_GET['message'];
}
	?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
	<title>Document</title>
</head>
<body>
	
	<?php
		include "inc/navbar.php";
		
	?>

	<div class="container">
		<?php
if (!empty($type) && !empty($message)) {
?>
		<div class="row">
			<div class="col-sm-12">
				<div class="alert <?php echo $type; ?> mt-4" role="alert">
				  <?php echo $message; ?>
				</div>
			</div>
		</div>
		<?php
}
?>
	</div>
	

	<?php
		include "inc/footer.html";
	?>

	<script src="js/jquery-3.3.1.js"></script>
 	<script src="js/bootstrap.js"></script>
</body>
</html>