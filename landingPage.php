<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // Datos de conexión
    $servername = "localhost";
    $username = "sa";
    $password = "olivio1212";
    $dbname = "Prueba";

    // Conexión a la base de datos
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Comprobación de la conexión
    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    }
    $sql="select * from Persona;";
    $resultado=mysqli_query($conn,$sql);
    $resul=[];
    foreach ($resultado as $key => $value) {
        $resul[]=($value);
    }
    var_dump($resul);
    ?>
    <form action="routes.php">
        <input type="submit" name="home" value="Home">
    </form>
</body>

</html>