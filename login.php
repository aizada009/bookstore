<?php
include "inc/connection.php";


if( isset($_POST['email']) ) {
	$email = getPost('email');
	$password = getPost('password');

	$query = $DBcon->query("SELECT * FROM `user` WHERE `email` = '$email'");

	$user= $query->fetch_assoc();


	

	if(empty($user)){
		$message="email или пароль не совпадают ";
		$message = urlencode($message);
		header('location: info.php?type=alert-danger&message=' . $message);
	}
	else {
		$hash=$user['password'];
		if(password_verify($password, $hash)){
			$loggedIn= TRUE;
			$_SESSION['id']= $user['id'];
			$_SESSION['username']=$user['username'];
			$_SESSION['email']= $user['email'];
			$message = "Успешно залогинились в систему!";
			
			$message = urlencode($message);
			
			header('location: info.php?type=alert-info&message=' . $message);
		}else {
			$message="email или пароль не совпадают ";
			$message = urlencode($message);
			header('location: infp.php?type=alert-danger&message=' . $message);
		}
	}

}


if(!empty($_SESSION['id'])){
	$loggedIn = TRUE;
	$id = $_SESSION['id'];
	$username = $_SESSION['username'];
	$email = $_SESSION['email'];

}
 if(isset($_POST['logout'])){
 	$loggedIn= FALSE;
 	destroy_session();
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
 function destroy_session(){
 	$_SESSION= array();
 	if( session_id() != "" || isset($_COOKIE[session_name()]))
 		setcookie(session_name(), '', time()-2592000, '/');
 	session_destroy();
 }



?>