<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Homepage</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"  crossorigin="anonymous">	
</head>

<body>
<div class = "container">
	<div class="jumbotron">
      <h1 class="display-4">Simple LAMP web app</h1>
      <p class="lead">Demo app</p>
    </div>	

	<p>
		<a href="index.php">Home</a>
		<br/>
	</p>

<?php
include("config.php");

if(isset($_POST['username']) && isset($_POST['password'])) {
	$user = $mysqli->real_escape_string( $_POST['username']);
	$pass = $mysqli->real_escape_string( $_POST['password']);

	if($user == "" || $pass == "") {
		echo "Either username or password field is empty.";
		echo "<br/>";
		echo "<a href='login.php'>Go back</a>";
	} else {
		$result = $mysqli->query("SELECT * FROM login WHERE username='$user' AND password=md5('$pass')")
					or die("Could not execute the select query.");
		
		$row = $result->fetch_assoc();
		
		if(is_array($row) && !empty($row)) {
			$_SESSION['logged'] = true;
			$_SESSION['username'] = $row['username'];
			$_SESSION['name'] = $row['name'];
			$_SESSION['id'] = $row['id'];
		} else {
			echo "Invalid username or password.";
			echo "<br/>";
			echo "<a href='login.php'>Go back</a>";
		}

		if(isset($_SESSION['valid'])) {
			header('Location: index.php');			
		}
	}
} else {
?>

	<h3>Login</h3>
	<form action="login.php" method="post">

		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" class="form-control" name="username">
		</div>

		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" name="password">
		</div>

		<div class="form-group">
			<input type="submit" value="Submit" class="form-control" >
		</div>
	</form>
<?php
}
?>

</div>
</body>
</html>