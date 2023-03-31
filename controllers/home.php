<?php
// Cargar el archivo de configuración y la biblioteca de funciones
require_once('config.php');
require_once('./lib/peliculasService.php');

// Obtener los datos necesarios para la vista
$titulo = 'Página de inicio';
$mensaje = 'Bienvenido a mi sitio web!';

require_once('views/home.php');
?>
