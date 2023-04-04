<?php
    require_once('db.php');
    require_once 'models/Format.php';
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
    function getFormat($id){
        global $conn;
        $sql = "select * from Format WHERE id=$id;";
        $resultado = mysqli_query($conn, $sql); 
        $resul = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $resul[] = $fila;
        }
        return $resul;
    }
    function postFormat(Format $f){
        global $conn;
        $sql = "INSERT INTO Format (name) VALUES ('$f->name');";
            try {
                $resultado = mysqli_query($conn, $sql);
                if($resultado){
                    return "Created successfully";
                }
            } catch (\Throwable $th) {
                return $th;
            }
    }
    function deleteFormat($id){
        global $conn;
        $sql = "DELETE FROM Format WHERE id=$id;";
        try {
            $resultado = mysqli_query($conn, $sql);
            if($resultado){
                return "Deleted successfully";
            }
        } catch (\Throwable $th) {
            return $th;
        }
    }
    function updateFormat(Format $f){
        global $conn;
        $sql = "UPDATE Format SET name='$f->name' WHERE id=$f->id;";
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