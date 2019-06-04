<?php
include "inc/connection.php";


$username = $email = $phone = $password = $confirmPassword = $terms = $checked = '';

if (isset($_POST['username'])) {
	$username = getPost('username');
	$email = getPost('email');
	$phone = getPost('phone');
	$password = getPost('password');
	$confirmPassword = getPost('confirmPassword');

	$error = '';
	$reg="";

	if (!isset($_POST['terms']) && $_POST['terms'] !== 'on') {
		$error .= '<p>Поставьте галочку о прочтении правил</p>';
	} else {
		$checked = 'checked';
	}
	if (is_null($username)) {
		$error .= '<p>Заполни имя</p>';
	} elseif (strlen($username) < 3) {
		$error .= '<p>Имя не может быть короче трех символов</p>';
	}
	if (is_null($email)) {
		$error .= '<p>Емаил не заполнен</p>';
	}
	if (is_null($phone)) {
		$error .= '<p>Телефон не заполнен</p>';
	}
	if (is_null($password)) {
		$error .= '<p>Пароль не может быть пустым</p>';
	} elseif (strlen($password) < 6) {
		$error .= '<p>Пароль должен состоять из не менее чем 6 символов</p>';
	}
	if (is_null($confirmPassword)) {
		$error .= '<p>Повторите пароль</p>';
	}
	if ($password !== $confirmPassword) {
		$error .= '<p>Пароли не совпадают</p>';
	}

	if (empty($error)) {
		$password = password_hash($password, PASSWORD_DEFAULT);
		$status = 0;
		$time = time();
		// $date = date('Y-m-d');
		$insertQuery = $DBcon->query("INSERT INTO `user` VALUES (NULL, '$email', '$phone', '$username', '$password', '$status', '$time')");
		if ($insertQuery) {
			$reg .= '<p>Вы успешно зарегитрировались!</p>';
			
		} else {
			die('Неверный запрос: ' . $DBcon->error);
		}
	}
}

function getPost($post) {
	if (isset($_POST[$post]) && !empty($_POST[$post])) {
		$string = checkInputs($_POST[$post]);
		return $string;
	} else {
		return NULL;
	}
}

function checkInputs($string) {
	$string = stripslashes($string);
    $string = htmlspecialchars($string);
    $string = trim($string);
    return $string;
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
if (isset($error) && !empty($error)) {
?>
		<div class="row">
			<div class="col-sm-12">
				<div class="alert alert-danger mt-4" role="alert">
				  <?= $error; ?>
				</div>
			</div>
		</div>
<?php
}
?>
<?php
if(isset($reg) && !empty($reg)){


?> 

		<div class="row">
			<div class="col-sm-12">
				<div class="alert alert-primary mt-4" role="alert">
 					<?= $reg; ?>
				</div>
			</div>
		</div>
<?php
}
?>
		<div class="row">
			<div class="col-sm-12">
				<div class="jumbotron mt-4">
				    <h1 class="display-4">Регистрация</h1>
				    <p class="lead">Зарегистрируйтесь в моем блоге</p>
				    <hr class="my-4">

					<form action="registrate.php" method="POST">
					  <div class="form-group row">
					    <label for="username" class="col-sm-2 col-form-label">ФИО</label>
					    <div class="col-sm-10">
					      <input type="text" name="username" class="form-control" id="username" placeholder="ФИО" value="<?= $username ?>">
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
					    <div class="col-sm-10">
					      <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" value="<?= $email; ?>">
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="phone" class="col-sm-2 col-form-label">Телефон</label>
					    <div class="col-sm-10">
					      <input type="text" name="phone" class="form-control" id="phone" placeholder="Телефон" value="<?= $phone; ?>">
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="inputPassword3" class="col-sm-2 col-form-label">Пароль</label>
					    <div class="col-sm-10">
					      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Пароль">
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="confirmPassword" class="col-sm-2 col-form-label">Подтвердите пароль</label>
					    <div class="col-sm-10">
					      <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" placeholder="Подтвердите пароль">
					    </div>
					  </div>
					  <div class="form-group row">
					    <div class="col-sm-2">Правила</div>
					    <div class="col-sm-10">
					      <div class="form-check">
					        <input name="terms" class="form-check-input" type="checkbox" id="gridCheck1" <?= $checked; ?>>
					        <label class="form-check-label" for="gridCheck1">
					          С правилами блога ознакомлен.
					        </label>
					      </div>
					    </div>
					  </div>
					  <div class="form-group row">
					    <div class="col-sm-10">
					      <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
					    </div>
					  </div>
					</form>
				</div>

			</div>
		</div>
	</div>

	<?php
		include "inc/footer.html";
	?>

	<script src="js/jquery-3.3.1.js"></script>
 	<script src="js/bootstrap.js"></script>

</body>
</html>