<?php 
// Iniciamos la sesión
session_start();

// Incluimos la cabecera
include_once("views/header.php");

// Incluimos el objeto de conexión con la bd
include("config/config.php");

if(!empty($_POST)) {
	// Saneamos los parámetros que recibimos del formulario
	$username = mysqli_real_escape_string($mysqli, $_POST['username']);
	$password = mysqli_real_escape_string($mysqli, $_POST['password']);

	// Comprobamos si los parámetros están vacíos
	if(empty($username) || empty($password)) {
		$status = "error";
		$message = "Either username or password field is empty.";
	} else {
		// Si los parámetros no están vacíos los comparamos con los datos de la bd
		$result = $mysqli->query("SELECT * FROM login WHERE username='$username' AND password=md5('$password')");
		
		// Obtenemos una fila
		$row = $result->fetch_assoc();

		// Cerramos la conexión con la base de datos
		$mysqli->close();
		
		// Comparamos si la consulta ha tenido éxito
		if(is_array($row) && !empty($row)) {
			$_SESSION['logged'] = true;
			$_SESSION['username'] = $row['username'];
			$_SESSION['name'] = $row['name'];
			$_SESSION['id_login'] = $row['id'];

			// Redireccionamos a la página principal
			header('Location: index.php');
		} else {
			$status = "error";
			$message = "Invalid username or password.";
		}
	}
}

// Incluimos la vista del login
include_once("views/login.php");

// Incluimos el pie de página
include_once("views/footer.php");
?>