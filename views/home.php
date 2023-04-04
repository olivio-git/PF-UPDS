<?php
require_once('./lib/peliculasService.php');
require_once 'lib/genreService.php';

?>


<div class="page">
  <form method="GET">
  <div class="col-12 container-filter">
    <div class="selec">
      <label for="sort">Sort</label>
      <select class="select-sort" name="orden_nombre" id="sort">
      <option default value="ALL">ALL</option>
        <option value="ASC">A-Z</option>
        <option value="DESC">Z-A</option>
      </select>
    </div>
    <div class="selc">
      <label for="price">Precios</label>
      <select class="select-sort" name="orden_precio" id="sort">
        <option default value="ASC">Asendente</option>
        <option value="DESC">Desendente</option>
      </select>
    </div>
     
  </div>
  <button type="submit" class="btn btn-primary">
    Filtrar
  </button>
  </form>
  <h1>Todas las peliculas</h1>
  <div class="col-12 container-card">
    <?php
      $orden_nombre = $_GET['orden_nombre'] ?? "";
      $orden_precio = $_GET['orden_precio'] ?? "";
      foreach (getAllPeliculasFilter($orden_nombre, $orden_precio) as $pelicula) : ?>
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
</div>

