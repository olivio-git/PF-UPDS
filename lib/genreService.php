<?php
    require_once('db.php');
    function getAllGenres(){
        global $conn;
        $sql = "select * from Genre;";
        $resultado = mysqli_query($conn, $sql);
        $resul = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $resul[] = $fila;
        }
        return $resul;
    }
?>