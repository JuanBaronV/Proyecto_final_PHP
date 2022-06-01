<?php 
session_start();


if(!isset($_SESSION['logged'])) {
	header('Location: login.php');
}

include_once("views/header.php");
// including the database connection file
include_once("config.php");

if(!empty($_POST))
{	
	$id = $mysqli->real_escape_string($_POST['id']);
	$name = $mysqli->real_escape_string($_POST['name']);
	$qty = $mysqli->real_escape_string($_POST['qty']);
	$price = $mysqli->real_escape_string($_POST['price']);	
	
	// checking empty fields
	if(empty($name) || empty($qty) || empty($price)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($qty)) {
			echo "<font color='red'>Quantity field is empty.</font><br/>";
		}
		
		if(empty($price)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = $mysqli->query("UPDATE products SET name='$name', qty='$qty', price='$price' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: view.php");
	}
}

//getting id from url

$id = $mysqli->real_scape_string($_GET['id']);

//selecting data associated with this particular id
$result = $mysqli->query("SELECT * FROM products WHERE id=$id");

$product = array();
while($row = $result->fetch_array())
{
	$product['name'] = $row['name'];
	$product['qty'] = $row['qty'];
	$product['price'] = $row['price'];
}
include_once("views/edit.php");

include_once("views/footer.php");
?>