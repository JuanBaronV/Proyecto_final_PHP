<?php session_start(); ?>

<?php
if(!isset($_SESSION['logged'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include("config.php");

//getting id of the data from url y sanearlo

$id = $mysqli->real_escape_string ($_GET['id']);

//deleting the row from table
$result=$mysqli->query("DELETE FROM products WHERE id=$id");

//redirecting to the display page (view.php in our case)
header("Location:view.php");
?>