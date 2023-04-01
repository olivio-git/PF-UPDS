<?php
    require_once('db.php');
    require_once ('models/Pelicula.php');
    function getAllPeliculas(){
        global $conn;
        $sql = "select * from Pelicula;";
        $resultado = mysqli_query($conn, $sql);
        $resul = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $resul[] = $fila;
        }
        return $resul;
    }
    function postPelicula(Pelicula $p){
        global $conn;
        $sql = "INSERT INTO Pelicula (name, portada, poster, description, duration, active, date, language, classification, 
        principal, format, rating, stock, price) VALUES 
        ('$p->name', 
        '$p->portada',
         '$p->poster', 
         '$p->description',
          '$p->duration',
           TRUE, 
           '$p->date',
            '$p->language', 
            '$p->classification', 
            $p->principal,
            $p->format,
            $p->rating, 
            $p->stock,
            $p->price);";
            try {
                $resultado = mysqli_query($conn, $sql);
                if($resultado){
                    return "Created successfully";
                }
            } catch (\Throwable $th) {
                return $th;
            }
    }
    function deletePelicula($id){
        global $conn;
        $sql = "DELETE FROM Pelicula WHERE id=$id;";
        try {
            $resultado = mysqli_query($conn, $sql);
            if($resultado){
                return "Deleted successfully";
            }
        } catch (\Throwable $th) {
            return $th;
        }
    }
    function updatePelicula(Pelicula $p){
        global $conn;
        $sql = "UPDATE Pelicula SET name='$p->name', portada='$p->portada', poster='$p->poster', description='$p->description', 
        duration='$p->duration', active=$p->active, date='$p->date', language='$p->language', classification='$p->classification', 
        principal=$p->principal, format=$p->format, rating=$p->rating, stock=$p->stock, price=$p->price WHERE id=$p->id;";
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