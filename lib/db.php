<?php
    require_once('config.php');
    // Conexión a la base de datos
    $servername = $DB_HOST;
    $username = $DB_USER;
    $password = $DB_PASS;
    $dbname = $DB_NAME;
    $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    // Comprobación de la conexión
    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    }
    echo "Conexión establecida. Versión del servidor: " . mysqli_get_server_info($conn);    
?>