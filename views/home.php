<?php
require_once('./lib/peliculasService.php');
require_once 'lib/genreService.php';

?>


<div class="page">
  <div class="col-12 container-filter">
    <div class="selec">
      <label for="sort">Sort</label>
      <select class="select-sort" name="sort" id="sort">
        <option default value="A-Z">A-Z</option>
        <option value="Z-A">Z-A</option>
      </select>
    </div>
    <div class="selc">
      <label for="price">Precios</label>
      <select class="select-sort" name="sort" id="sort">
        <option default value="as">Asendente</option>
        <option value="des">Desendente</option>
      </select>
    </div>
    <div class="selc">
      <label for="price">Generos</label>
      <select class="select-sort" name="sort" id="sort">
        <?php foreach (getAllGenres() as $genre) : ?>
          <option value="<?= $genre['id'] ?>"><?= $genre['name'] ?></option>
        <?php endforeach ?>
      </select>
    </div>
  </div>
  <h1>Todas las peliculas</h1>
  <div class="col-12 container-card">
    <?php foreach (getAllPeliculas() as $pelicula) : ?>
      <div class="card-pel">
        <img src="<?= $pelicula['poster'] ?>" class="card-img-top" alt="<?= $pelicula['name'] ?>">
        <div class="card-body">
          <h5 class="card-title"><?= $pelicula['name'] ?></h5>
          <p class="card-text"><?= $pelicula['description'] ?></p>
        </div>
      </div>
    <?php endforeach ?>
  </div>
</div>