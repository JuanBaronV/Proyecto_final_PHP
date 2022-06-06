<?php 
// Iniciamos la sesión
session_start();

// Comprobamos si el usuario está logueado
if(!isset($_SESSION['logged'])) {
	header('Location: login.php');
}

// Incluimos el archivo de conexión con la base de datos
include_once("config/config.php");

// Incluimos la cabecera
include_once("views/header.php");

if(!empty($_POST)) {
	// Saneamos los datos que se reciben del formulario
	$id = $mysqli->real_escape_string($_POST['id']);
	$name = $mysqli->real_escape_string($_POST['name']);
	$qty = $mysqli->real_escape_string($_POST['qty']);
	$price = $mysqli->real_escape_string($_POST['price']);

	// Comprobamos si los parámetros contienen datos
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
		// Actualizamos el producto en la bd
		$result = $mysqli->query("UPDATE products SET name='$name', qty='$qty', price='$price' WHERE id=$id");
		
		// Redireccionamos a la página view.php
		header("Location: view.php");
	}
}

// Obtenemos el id del producto que vamos a eliminar
$id = $_GET['id'];

// Saneamos los datos que se reciben del formulario
$id = $mysqli->real_escape_string($_GET['id']);

// Obtenemos información del producto 
$result = $mysqli->query("SELECT * FROM products WHERE id=$id");

$producto = array();
while($row = $result->fetch_array())
{
	$producto['id'] = $row['id'];
	$producto['name'] = $row['name'];
	$producto['qty'] = $row['qty'];
	$producto['price'] = $row['price'];
}

// Cerramos la conexión con la bd
$mysqli->close();

// Incluimos la vista para editar productos
include_once("views/edit.php");

// Incluimos el pie de página
include_once("views/footer.php");
?>