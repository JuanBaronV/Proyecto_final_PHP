<?php 
// Iniciamos la sesión
session_start();

// Incluimos la cabecera
include_once('views/header.php');

if(isset($_SESSION['logged'])) {			
	// Incluimos la vista de la página principal del usuario logueado
	include('views/index.logged.php');
} else {
	// Incluimos la vista de la página principal del usuario sin loguear
	include('views/index.logout.php');
}

// Incluimos el pie de página
include_once('views/footer.php');
?>