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
		<a href="index.php" class="btn btn-primary">Home</a>
	</p>

<?php
include("config.php");

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$user = $_POST['username'];
	$pass = $_POST['password'];

	if($user == "" || $pass == "" || $name == "" || $email == "") {
		echo "All fields should be filled. Either one or many fields are empty.";
		echo "<br/>";
		echo "<a href='register.php'>Go back</a>";
	} else {
		mysqli_query($mysqli, "INSERT INTO login (name, email, username, password) VALUES ('$name', '$email', '$user', md5('$pass'))")
			or die("Could not execute the insert query.");
			
		echo "Registration successfully";
		echo "<br/>";
		echo "<a href='login.php'>Login</a>";
	}
} else {
?>
	<h3>Register</h3>
	<form action="register.php" method="post">

		<div class="form-group">
			<label for="name">Full Name</label>
			<input type="text" class="form-control" name="name">
		</div>

		<div class="form-group">
			<label for="email">Email</label>
			<input type="text" class="form-control" name="email">
		</div>

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