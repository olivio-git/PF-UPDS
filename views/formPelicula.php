<?php
require_once("lib/peliculasService.php");
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $portada = $_POST['portada'];
    $poster = $_POST['poster'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $language = $_POST['language'];
    $classification = $_POST['classification'];
    $principal = $_POST['principal'];
    $rating = $_POST['rating'];
    $format = $_POST['format'];
    $stock = $_POST['stock'];
    $price = $_POST['price'];
    postPelicula($name, $portada, $poster, $description, $date, $language, $classification, $principal, $rating, $format, $stock, $price);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <br>
        <label for="name">Name</label>
        <input type="text" name="name">
        <br>
        <label for="portada">Portada</label>
        <input type="text" name="portada">
        <br>
        <label for="poster">Poster</label>
        <input type="text" name="poster">
        <br>
        <label for="description">Description</label>
        <input type="text" name="description">
        <br>
        <label for="date">Date</label>
        <input type="date" name="date">
        <br>
        <label for="language">Language</label>
        <input type="text" name="language">
        <br>
        <label for="classification">Classification</label>
        <input type="text" name="classification">
        <br>
        <label for="principal">Principal</label>
        <input type="number" name="principal">
        <br>
        <label for="rating">Rating</label>
        <input type="text" name="rating">
        <br>
        <label for="format">Format</label>
        <input type="number" name="format">
        <br>
        <label for="stock">Stock</label>
        <input type="number" name="stock">
        <br>
        <label for="price">Price</label>
        <input type="text" name="price">
        <br>
        <input type="submit" value="Create">
        <br>   
    </form>

</body>

</html>