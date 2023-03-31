<?php
// Cargar el archivo de configuración y la biblioteca de funciones
require_once('config.php');
require_once('./lib/db.php');

// Obtener la URL de la solicitud actual
$request_uri = $_SERVER['REQUEST_URI'];

// Enrutamiento de solicitudes a controladores
switch ($request_uri) {
    case '/home':
        require_once('./controllers/home.php');
        break;
    case '/about':
        require_once('controllers/about.php');
        break;
    case '/contact':
        require_once('controllers/contact.php');
        break;
    case '/notfound':
        require_once('controllers/404.php');
        break;
    case '/index.php':
        require_once('controllers/home.php');
        break;
    default:
    require_once('controllers/home.php');
    break;
    //luis12345678
}
?>
