<?php
    require_once('db.php');
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
    function postPelicula($name, $portada, $poster, $description, $date, $language, $classification, $principal, $rating, $format, $stock, $price){
        global $conn;
        $sql = "INSERT INTO Pelicula (name, portada, poster, description, duration, active, date, language, classification, principal, format, rating, stock, price) VALUES 
        ('$name', 
        '$portada',
         '$poster', 
         '$description',
          '1h 28m',
           TRUE, 
           '$date',
            '$language', 
            '$classification', 
            1,
            1,$rating, $stock,$price);";
            try {
                $resultado = mysqli_query($conn, $sql);
                if($resultado){
                    echo"Created successfully";
                }
            } catch (\Throwable $th) {
                echo $th;
            }
    }
    function deletePelicula($id){
        global $conn;
        $sql = "select * from Pelicula;";
        $resultado = mysqli_query($conn, $sql);
        $resul = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $resul[] = $fila;
        }
        return $resul;
    }
    function updatePelicula($id,$obj){
        global $conn;
        $sql = "select * from Pelicula;";
        $resultado = mysqli_query($conn, $sql);
        $resul = [];
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $resul[] = $fila;
        }
        return $resul;
    }
?>