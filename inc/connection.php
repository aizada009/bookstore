<?php

if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
// Подключение к базе данных (MySQL)
$DBhost = "localhost";
$DBuser = "root";
$DBpass = "";
$DBname = "mydb";

$DBcon = new Mysqli($DBhost, $DBuser, $DBpass, $DBname);
$DBcon->set_charset('utf8');
mb_internal_encoding('UTF-8');

if ($DBcon->connect_errno) {
	die("Ошибка: " . $DBcon->connect_error);
}


?>