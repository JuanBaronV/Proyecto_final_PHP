<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Página principal</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"  crossorigin="anonymous">	
</head>

<body>
<div class = "container">
	<div class="jumbotron">
      <h1 class="display-4">Simple LAMP web app</h1>
      <p class="lead">Demo app</p>
    </div>	

	<?php
	if(isset($_SESSION['logged'])) {			
		include("config.php");					
		$result = $mysqli->query("SELECT * FROM login");
	?>				
		Bienvenido <?php echo $_SESSION['name'] ?> !
		<br/><br/>
		<a href='view.php'>Ver y añadir productos</a> | <a href='logout.php'>Cerrar sesión</a><br/>
		<br/><br/>
	<?php	
	} else {
		echo "Debes estar logeado para ver esta págona.<br/><br/>";
		echo "<a href='login.php'>Iniciar sesión</a> | <a href='register.php'>Crear una cuenta</a>";
	}
	?>

</div>
</body>
</html>