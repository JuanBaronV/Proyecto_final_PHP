<?php
// Incluimos el objeto de conexión con la bd
include("config/config.php");

// Incluimos la cabecera
include_once("views/header.php");

// Si no recibimos nada por POST
if(!empty($_POST)) {
	// Si recibimos parámetros por POST los saneamos para evitar SQL injection
	$name = $mysqli->real_escape_string($_POST['name']);
	$email = $mysqli->real_escape_string($_POST['email']);
	$name = $mysqli->real_escape_string($_POST['f_nacimiento']);
	$name = $mysqli->real_escape_string($_POST['telefono']);
	$username = $mysqli->real_escape_string($_POST['username']);
	$password = $mysqli->real_escape_string($_POST['password']);

	// Comparamos si los parámetros están vacíos
	if(empty($name) || empty($email) || empty($f_nacimiento) || empty($telefono) || empty($username) || empty($password)) {
		$status = "error";
		$message = "All fields should be filled. Either one or many fields are empty.";
	} else {
		// Si no están vacíos los insertamos en la bd
		$mysqli->query("INSERT INTO login (name, email, f_nacimiento, telefono, username, password) VALUES ('$name', '$email', '$f_nacimiento', '$telefono' '$username', md5('$password'))");

		// Comprobamos si la inserción se realizó con éxito
		if ($mysqli->errno == 0) {
			$status = "success";
			$message = "Registration successfully.";
		} else {
			$status = "error";
			$message = "Error: $mysqli->error";
		}

		// Cerramos la conexión con la base de datos
		$mysqli->close();
	}
}

// Incluimos la vista para registrar usuarios
include_once("views/register.php");

// Incluimos el pie de página
include_once("views/footer.php");
?>