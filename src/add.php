<?php session_start(); ?>

<?php
if(!isset($_SESSION['logged'])) {
	header('Location: login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">	
	<title>Add Data</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"  crossorigin="anonymous">
</head>

<body>
<div class = "container">
		<div class="jumbotron">
			<h1 class="display-4">Simple LAMP web app</h1>
			<p class="lead">Demo app</p>
		</div>
			

<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['name']) && isset($_POST['qty']) && isset($_POST['price'])) {	
	$name = $_POST['name'];
	$qty = $_POST['qty'];
	$price = $_POST['price'];
	$loginId = $_SESSION['id'];
		
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
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = $mysqli->query("INSERT INTO products(name, qty, price, login_id) VALUES('$name','$qty','$price', '$loginId')");

		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='view.php'>View Result</a>";
	}
}
?>

</div>
</body>
</html>