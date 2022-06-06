<?php 
// Iniciamos la sesión
session_start();

// Comprobamos si el usuario está logueado
if(!isset($_SESSION['logged'])) {
	header('Location: login.php');
}

// Incluimos el objeto de conexión con la bd
include("config/config.php");

// Saneamos id del producto que recibimos del formulario
$id = $mysqli->real_escape_string($_GET['id']);

// Eliminamos el producto de la bd
$result = $mysqli->query("DELETE FROM products WHERE id=$id");

// Cerramos la conexión con la base de datos
$mysqli->close();

// Redireccionamos a la página view.php
header("Location:view.php");
?>