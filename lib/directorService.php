<?php
    require_once('db.php');
    function getAllDirectores(){
        global $conn;
        $sql = "select * from Principal;";
        $resultado = mysqli_query($conn, $sql);
        $resul = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $resul[] = $fila;
        }
        return $resul;
    }
?>