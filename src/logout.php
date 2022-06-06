<?php
// Iniciamos la sesión
session_start();

// Elimina toda la información registrada en la sesión
session_destroy();

// Redireccionamos a la página index.php
header("Location:index.php");
?>