<?php 
// Iniciamos la sesión
session_start();

// Comprobamos si el usuario está logueado
if(!isset($_SESSION['logged'])) {
	header('Location: login.php');
}

// Incluimos el objeto de conexión con la bd
include_once("config/config.php");

// Incluimos la cabecera
include_once("views/header.php");

if(!empty($_POST)) {
	// Saneamos los datos que se reciben del formulario
	$name = $mysqli->real_escape_string($_POST['name']);
	$qty = $mysqli->real_escape_string($_POST['qty']);
	$price = $mysqli->real_escape_string($_POST['price']);
	
	// Obtenemos el id del usuario de la sesión
	$id_login = $_SESSION['id_login'];
	
	// Comprobamos si los parámetros están vacíos
	if(empty($name) || empty($qty) || empty($price)) {
				
		if(empty($name)) {
			$status = "error";
			$message = "Name field is empty.<br/>";
		}
		
		if(empty($qty)) {
			$status = "error";
			$message .= "Quantity field is empty.<br/>";
		}
		
		if(empty($price)) {
			$status = "error";
			$message .= "Price field is empty.<br/>";
		}
	} else { 
		// Si los parámetros no están vacíos, los insertamos en la bd
		$result = $mysqli->query("INSERT INTO products(name, qty, price, id_login) VALUES('$name','$qty','$price', '$id_login')");
		
		// Cerramos la conexión con la base de datos
		$mysqli->close();

		$status = "success";
		$message = "Data added successfully.";
	}
} 

// Incluimos la vista para añadir productos
include_once("views/add.php");	

// Incluimos el pie de página
include_once("views/footer.php");
?>