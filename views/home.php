<?php
require_once('./lib/peliculasService.php');
require_once 'lib/genreService.php';
require_once 'lib/formatService.php';

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
          <option default value="ALL">All</option>
          <option value="ASC">Asendente</option>
          <option value="DESC">Desendente</option>
        </select>
      </div>
      <div class="selc">
        <label for="price">Formatos</label>
        <select class="select-sort" name="orden_formato" id="sort">
          <option default value="ALL">All</option>
          <?php
          foreach(getAllFormats() as $format):?>
          <option value="<?= $format['id']?>"><?=$format['name']?></option>
          <?php endforeach?>
        </select>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">
      Filtrar
    </button>
  </form>
  <h1>Todas las peliculas</h1>
  <div class="row justify-content-center pb-3 pt-3">
  <div class="col-9 container-cards">
    <?php 
      $orden_nombre = $_GET['orden_nombre'] ?? "";
      $orden_precio = $_GET['orden_precio'] ?? "";
      $orden_formato = $_GET['orden_formato'] ?? "";
      $movies = getAllPeliculasFilter($orden_nombre, $orden_precio, $orden_formato);
      if(empty($movies)) {
        echo "<h1>No se han encontrado películas con ese Formato $orden_formato</h1>";
      } else {
        foreach ($movies as $movie) : ?>
          <div class="card">
            <div class="button-container">
              <div class="row justify-content-center">
                <div class="col-11"><i class="fa-solid fa-cart-shopping"></i></div>
                <div class="col-11"><a href="/detallePelicula?id=<?=$movie['id']?>"><i class="fa-solid fa-circle-info" ></a></i></div>
                <div class="col-11"><i class="fa-solid fa-share-nodes"></i></div>
              </div>
            </div>
            <img src="<?= $movie['poster'] ?>" class="card-img-top" alt="..." height="300vh">
            <div class="card-body">
              <h6 class="card-title text-center"><?= $movie['name'] ?></h6>
              <p class="card-text text-center price">$<?= $movie['price'] ?></p>
            </div>
          </div>
        <?php endforeach;
      }
    ?>
  </div>
</div>

</div>