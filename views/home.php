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
    require_once('navbar.php'); 
    require_once('./lib/getAllPeliculas.php');
    ?>
    <div class="card-deck">
  <?php foreach ($resul as $pelicula): ?>
    <div class="card">
      <img src="<?= $pelicula['image'] ?>" class="card-img-top" alt="<?= $pelicula['name'] ?>">
      <div class="card-body">
        <h5 class="card-title"><?= $pelicula['name'] ?></h5>
        <p class="card-text"><?= $pelicula['description'] ?></p>
      </div>
    </div>
  <?php endforeach ?>
</div>

</body>
</html>