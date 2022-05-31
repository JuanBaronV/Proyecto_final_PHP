<?php session_start();

// Comprobamos si el usuario está logeado
if(!isset($_SESSION['logged'])) {
	header('Location: login.php');
}

//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
$result = $mysqli->query("SELECT * FROM products WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>