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
  <div class="row justify-content-center pb-3 pt-3">
      <div class="col-9 container-cards">
            <?php foreach (getAllPeliculas() as $movie):?>
            <div class="card">
              <div class="button-container">
                <div class="row justify-content-center">
                  <div class="col-11"><i class="fa-solid fa-cart-shopping"></i></div>
                  <div class="col-11"><i class="fa-solid fa-circle-info" ></i></div>
                  <div class="col-11"><i class="fa-solid fa-share-nodes"></i></div>
                </div>
              </div>
              <img src="<?=$movie['poster']?>" class="card-img-top" alt="..." height="300vh">
              <div class="card-body">
                <h6 class="card-title text-center"><?=$movie['name']?></h6>
                <p class="card-text text-center price">$<?=$movie['price']?></p>
              </div>
            </div>
            <?php endforeach?>
      </div>
  </div>

</div>