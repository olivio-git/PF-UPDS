<?php
    require_once('db.php');
    function getAllActores(){
        global $conn;
        $sql = "select * from Actor;";
        $resultado = mysqli_query($conn, $sql);
        $resul = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $resul[] = $fila;
        }
        return $resul;
    }
?>