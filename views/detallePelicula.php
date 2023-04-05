<?php
    require_once 'lib/peliculasService.php';
    require_once 'lib/formatService.php';
    require_once 'models/Pelicula.php';
    $pelicula=new Pelicula();
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        foreach (getPelicula($id)[0] as $key => $value) {
            $pelicula->$key=$value;
            if($key=='format'){
                foreach (getFormat($value) as $format){
                    $pelicula->format=$format['name'];
                }
            }
        }
    }
    
?>

<div class="page">
    <div class="backdrop" >
    <img src="<?=$pelicula->portada?>" alt="">
    </div>
    <div class="pt-3 detail">
        <div class="row justify-content-center pb-3 ">
            <div class="col-6 detailContent">
                <h1 class="text-center text-uppercase fw-bold font-monospace pb-3"><?=$pelicula->name;?></h1>
                <!-- <div class="row">
                  <div class="col text-center pb-3 border-end  border-light"><i class="fa-solid fa-cart-shopping shop" (click)="postCar(Movie)"></i></div>
                  <div class="col text-center pb-3 border-end border-start border-light" *ngFor="let g of genres">{{g.name}}</div>
                </div> -->
                <div class="row mt-5">
                  <div class="col text-center pb-3 "><?=$pelicula->duration?> min</div>
                  <div class="col text-center pb-3 "><?=$pelicula->format?></div>
                  <div class="col text-center pb-3 ">Precio: $<?=$pelicula->price?></div>
                </div>
              <div class="detail-body">
                <p class="lbl "><label >Titulo Original:</label> <?=$pelicula->name?></p>
              <p class="lbl"><label >Fecha de Lanzamiento:</label> <?=$pelicula->date?></p>
              <p class="lbl"><label >Lenguaje:</label> <?=$pelicula->language?></p>
              <p class="lbl"><label >Stock:</label> <?=$pelicula->stock?></p>
              <p ><label class="star" ><?php
                $entero = floor($pelicula->rating);
                $fraccion = $pelicula->rating - $entero;
                for ($i = 1; $i <= $entero; $i++) {
                    echo "★";
                }
                if ($fraccion > 0) {
                    echo "☆"; 
                }
              ?></label></p>
              <p class="fs-5 "><?=$pelicula->description?></p>
              </div>
              
            </div>
            <div class="col-3 detail-image ">
                <div class="card text-bg-dark">
                    <img src="<?=$pelicula->poster?>" class="card-img " alt="..." height="500px">
                  </div>
              </div> 
        </div>
</div>    
</div>