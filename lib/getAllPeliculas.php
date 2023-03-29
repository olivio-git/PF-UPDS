<?php
    require_once('config.php');
    require_once('db.php');
    $sql = "select * from Pelicula;";
    $resultado = mysqli_query($conn, $sql);
    $resul = [];
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $resul[] = $fila;
    }
    return $resul;
?>