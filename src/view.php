<?php 
// Iniciamos la sesión
session_start();

// Comprobamos si el usuario tiene una sesión iniciada
if(!isset($_SESSION['logged'])) {
	header('Location: login.php');
}

// Incluimos el archivo de conexión con la base de datos
include_once("config/config.php");

// Incluimos la cabecera
include_once("views/header.php");

// Hacemos una consulta a la base de datos
$result = $mysqli->query("SELECT * FROM products WHERE id_login=".$_SESSION['id_login']." ORDER BY id DESC");

// Guardamos el resultado de la consulta en un array
$productos = array();
while($row = $result->fetch_array()) {
	$productos[] = $row;
}

// Cerramos la conexión con la base de datos
$mysqli->close();

// Incluimos la vista para ver un producto
include('views/view.php');

// Incluimos el pie de página
include_once("views/footer.php");
?>