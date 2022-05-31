<?php 
session_start();


if(!isset($_SESSION['logged'])) {
	header('Location: login.php');
}


// including the database connection file
include_once("config.php");

if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['qty']) && isset($_POST['price']))
{	
	$id = $_POST['id'];
	$name = $_POST['name'];
	$qty = $_POST['qty'];
	$price = $_POST['price'];	
	
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
$id = $_GET['id'];

//selecting data associated with this particular id
$result = $mysqli->query("SELECT * FROM products WHERE id=$id");

while($row = $result->fetch_array())
{
	$name = $row['name'];
	$qty = $row['qty'];
	$price = $row['price'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">	
	<title>Edit Data</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"  crossorigin="anonymous">
</head>

<body>
	<div class = "container">
		<div class="jumbotron">
			<h1 class="display-4">Simple LAMP web app</h1>
			<p class="lead">Demo app</p>
		</div>
			

	<a href="index.php">Home</a> | <a href="view.php">View Products</a> | <a href="logout.php">Logout</a>
	<br/><br/>
	
	<form action="edit.php" method="post">

		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" class="form-control" name="name" value="<?php echo $name;?>">
		</div>

		<div class="form-group">
			<label for="qty">Quantity</label>
			<input type="number" class="form-control" name="qty" value="<?php echo $qty;?>">
		</div>

		<div class="form-group">
			<label for="price">Price</label>
			<input type="number" class="form-control" name="price" value="<?php echo $price;?>">
		</div>

		<div class="form-group">
			<label for="price">Price</label>
			<input type="number" class="form-control" name="price" value="<?php echo $price;?>">
		</div>

		<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
		
		<div class="form-group">
			<input type="submit" value="Update" class="form-control" >
		</div>
	</form>
</div>
</body>
</html>