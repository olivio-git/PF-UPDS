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
    function getAllPeliculasFilter($orden_nombre, $orden_precio) {
        global $conn;
        $sql = "SELECT * FROM Pelicula";
        
        if ($orden_nombre != "ALL") {
                $sql .= " ORDER BY name $orden_nombre";
        }
      
        if ($orden_nombre  != "") {
            $sql .= " ORDER BY price $orden_precio";
        }
  
        $resultado = mysqli_query($conn, $sql);
        $resul = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $resul[] = $fila;
        }
        return $resul;
      }
    function getPelicula($id){
        global $conn;
        $sql = "select * from Pelicula WHERE id=$id;";
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
                    $p->id=mysqli_insert_id($conn);
                    foreach ($p->genres as $idGenre) {
                        $sqlG=" INSERT INTO PeliculaGenre (idPelicula, idGenre) VALUES ($p->id, $idGenre);";
                        mysqli_query($conn, $sqlG);
                    }
                    foreach ($p->actores as $idActor) {
                        $sqlA=" INSERT INTO PeliculaActor (idPelicula, idActor) VALUES ($p->id, $idActor);";
                        mysqli_query($conn, $sqlA);
                    }
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
            $SqldeleteA="DELETE FROM PeliculaActor WHERE idPelicula=$p->id;";
            $SqldeleteG="DELETE FROM PeliculaGenre WHERE idPelicula=$p->id;";
            mysqli_query($conn, $SqldeleteA);
            mysqli_query($conn, $SqldeleteG);
            $resultado = mysqli_query($conn, $sql);
            if($resultado){
                foreach ($p->genres as $idGenre) {
                    $sqlG=" INSERT INTO PeliculaGenre (idPelicula, idGenre) VALUES ($p->id, $idGenre);";
                    mysqli_query($conn, $sqlG);
                }
                foreach ($p->actores as $idActor) {
                    $sqlA=" INSERT INTO PeliculaActor (idPelicula, idActor) VALUES ($p->id, $idActor);";
                    mysqli_query($conn, $sqlA);
                }
                return "Updated successfully";
            }
        } catch (\Throwable $th) {
            return $th;
        }
    }
    function getAllPeliculaActor($idPelicula){
        global $conn;
        $sql = "select * from PeliculaActor WHERE idPelicula=$idPelicula;";
        $resultado = mysqli_query($conn, $sql);
        $resul = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $resul[] = $fila;
        }
        return $resul;
    }
    function getAllPeliculaGenre($idPelicula){
        global $conn;
        $sql = "select * from PeliculaGenre WHERE idPelicula=$idPelicula;";
        $resultado = mysqli_query($conn, $sql);
        $resul = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $resul[] = $fila;
        }
        return $resul;
    }
?>