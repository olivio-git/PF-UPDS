<?php
require_once('./lib/peliculasService.php');
?>


<div class="page">
<h1>Home</h1>
    <div class="col-12">
      <div class="card-deck">
        <?php foreach (getAllPeliculas() as $pelicula) : ?>
          <div class="card">
            <img src="<?= $pelicula['poster'] ?>" class="card-img-top" alt="<?= $pelicula['name'] ?>">
            <div class="card-body">
              <h5 class="card-title"><?= $pelicula['name'] ?></h5>
              <p class="card-text"><?= $pelicula['description'] ?></p>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
</div>