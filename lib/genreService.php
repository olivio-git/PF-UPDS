<?php
    require_once('db.php');
    require_once 'models/Genre.php';
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
    function getGenre($id){
        global $conn;
        $sql = "select * from Genre WHERE id=$id;";
        $resultado = mysqli_query($conn, $sql); 
        $resul = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $resul[] = $fila;
        }
        return $resul;
    }
    function postGenre(Genre $g){
        global $conn;
        $sql = "INSERT INTO Genre (name,  active) VALUES ('$g->name', TRUE);";
            try {
                $resultado = mysqli_query($conn, $sql);
                if($resultado){
                    return "Created successfully";
                }
            } catch (\Throwable $th) {
                return $th;
            }
    }
    function deleteGenre($id){
        global $conn;
        $sql = "DELETE FROM Genre WHERE id=$id;";
        try {
            $resultado = mysqli_query($conn, $sql);
            if($resultado){
                return "Deleted successfully";
            }
        } catch (\Throwable $th) {
            return $th;
        }
    }
    function updateGenre(Genre $g){
        global $conn;
        $sql = "UPDATE Genre SET name='$g->name', active=$g->active WHERE id=$g->id;";
        try {
            $resultado = mysqli_query($conn, $sql);
            if($resultado){
                return "Updated successfully";
            }
        } catch (\Throwable $th) {
            return $th;
        }
    }
?>