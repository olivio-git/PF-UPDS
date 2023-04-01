<?php
    require_once('db.php');
    function getAllFormats(){
        global $conn;
        $sql = "select * from Format;";
        $resultado = mysqli_query($conn, $sql);
        $resul = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $resul[] = $fila;
        }
        return $resul;
    }
?>