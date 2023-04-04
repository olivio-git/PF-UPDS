<?php
    require_once('db.php');
    require_once 'models/Persona.php';
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
    function getActor($id){
        global $conn;
        $sql = "select * from Actor WHERE id=$id;";
        $resultado = mysqli_query($conn, $sql); 
        $resul = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $resul[] = $fila;
        }
        return $resul;
    }
    function postActor(Persona $p){
        global $conn;
        $sql = "INSERT INTO Actor (name, image) VALUES ('$p->name', '$p->image');";
            try {
                $resultado = mysqli_query($conn, $sql);
                if($resultado){
                    return "Created successfully";
                }
            } catch (\Throwable $th) {
                return $th;
            }
    }
    function deleteActor($id){
        global $conn;
        $sql = "DELETE FROM Actor WHERE id=$id;";
        try {
            $resultado = mysqli_query($conn, $sql);
            if($resultado){
                return "Deleted successfully";
            }
        } catch (\Throwable $th) {
            return $th;
        }
    }
    function updateActor(Persona $p){
        global $conn;
        $sql = "UPDATE Actor SET name='$p->name', image='$p->image' WHERE id=$p->id;";
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