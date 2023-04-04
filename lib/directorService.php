<?php
    require_once('db.php');
    require_once 'models/Persona.php';
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
    function getDirector($id){
        global $conn;
        $sql = "select * from Principal WHERE id=$id;";
        $resultado = mysqli_query($conn, $sql); 
        $resul = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $resul[] = $fila;
        }
        return $resul;
    }
    function postDirector(Persona $p){
        global $conn;
        $sql = "INSERT INTO Principal (name, image) VALUES ('$p->name', '$p->image');";
            try {
                $resultado = mysqli_query($conn, $sql);
                if($resultado){
                    return "Created successfully";
                }
            } catch (\Throwable $th) {
                return $th;
            }
    }
    function deleteDirector($id){
        global $conn;
        $sql = "DELETE FROM Principal WHERE id=$id;";
        try {
            $resultado = mysqli_query($conn, $sql);
            if($resultado){
                return "Deleted successfully";
            }
        } catch (\Throwable $th) {
            return $th;
        }
    }
    function updateDirector(Persona $p){
        global $conn;
        $sql = "UPDATE Principal SET name='$p->name', image='$p->image' WHERE id=$p->id;";
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