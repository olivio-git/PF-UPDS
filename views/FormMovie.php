<?php
 require_once 'lib/directorService.php';
 require_once 'lib/formatService.php';
 require_once 'models/Pelicula.php';
 require_once 'lib/actorService.php';
 require_once 'lib/genreService.php';
 require_once 'lib/peliculasService.php';
 $error=[];
 foreach ($_REQUEST as $key => $value) {
    if ($_REQUEST[$key] == '') {
        $error[$key] = 'Error: El campo ' . $key . ' no puede estar vacio';
    }
 }
 $pelicula=new Pelicula();
 if(isset($_GET['id'])){
    $paramID=$_GET['id'];
    $pelicula->id=$paramID;
    foreach (getPelicula($paramID)[0] as $key => $value) {
        $pelicula->$key=$value;
    }
    foreach(getAllPeliculaActor($paramID) as $value){
        $pelicula->actores[]=$value['idActor'];
    }
    foreach(getAllPeliculaGenre($paramID) as $value){
        $pelicula->genres[]=$value['idGenre'];
    }
 }
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!isset($_REQUEST['actor'])||!isset($_REQUEST['principal'])){
        $error['actor']='Error: Debe seleccionar al menos una opcion de cada campo';
    }
    if(!isset($_REQUEST['genre'])){
        $error['genre']='Error: Debe seleccionar al menos una opcion';
    }
    $pelicula->id=$_POST['btn'];
    $pelicula->name=$_POST['name']?:'';
    $pelicula->portada=$_POST['portada']?:'';
    $pelicula->poster=$_POST['poster']?:'';
    $pelicula->description=$_POST['description']?:'';
    $pelicula->duration=$_POST['duration']?:'';
    $pelicula->date=$_POST['date']?:'';
    $pelicula->active=$_POST['active']?:'';
    $pelicula->language=$_POST['language']?:'';
    $pelicula->classification=$_POST['classification']?:'';
    $pelicula->principal=isset($_POST['principal'])?$_POST['principal']:'';
    $pelicula->rating=$_POST['rating']?:'';
    $pelicula->format=$_POST['format']?:'';
    $pelicula->stock=$_POST['stock']?:'';
    $pelicula->price=$_POST['price']?:'';
    $pelicula->genres=isset($_POST['genre'])?$_POST['genre']:[];
    $pelicula->actores=isset($_POST['actor'])?$_POST['actor']:[];
    if(count($error)<=0){
        if(isset($_GET['accion'])){
            updatePelicula($pelicula);
        }
        else{
            postPelicula($pelicula);
        }
    }
 }
?>
<div class="page">
    <h1 class="form-title"><?php
        if(isset($_GET['accion'])){
            echo 'MODIFICAR';
        }
        else{
            echo'AGREGAR';
        }
    ?><span> PELICULA</span></h1>
        <div class="row justify-content-center">
                <form action="/FormMovie<?php
                    if(isset($_GET['accion'])){
                        echo '?accion=Modificar';
                    }
                ?>" method="post" class="form-container col-11">
                    <div class="col-7 form-left">
                    <div class="col-6">
                        <div>
                            <div>
                                <label class="label-form-g" for="">Name</label>
                                <?php if(isset($error['name'])):?>
                                <div>
                                <span class="error"><?= $error['name']?></span>
                                </div>
                                <?php endif ?>
                            </div>
                            <input type="text" name="name" <?php if($pelicula->name!=''){
                                echo 'value="'.$pelicula->name.'"';
                            }?>>
                        </div>
                        <div>
                            <div>
                                <label class="label-form-g" for="">Portada</label>
                                <?php if(isset($error['portada'])):?>
                                <div>
                                <span class="error"><?= $error['portada']?></span>
                                </div>
                                <?php endif ?>
                            </div>
                            <input type="url" name="portada" <?php if($pelicula->portada!=''){
                                echo 'value="'.$pelicula->portada.'"';
                            }?>>
                        </div>
                        <div>
                            <div>
                                <label class="label-form-g" for="">Poster</label>
                                <?php if(isset($error['poster'])):?>
                                <div>
                                <span class="error"><?= $error['poster']?></span>
                                </div>
                                <?php endif ?>
                            </div>
                            <input type="url" name="poster" <?php if($pelicula->poster!=''){
                                echo 'value="'.$pelicula->poster.'"';
                            }?>>
                        </div>
                        <div>
                            <div>
                                <label class="label-form-g" for="">Description</label>
                                <?php if(isset($error['description'])):?>
                                <div>
                                <span class="error"><?= $error['description']?></span>
                                </div>
                                <?php endif ?>
                            </div>
                            <input type="text" name="description" <?php if($pelicula->description!=''){
                                echo 'value="'.$pelicula->description.'"';
                            }?>>
                        </div>
                        <div>
                            <div>
                                <label class="label-form-g" for="">Duration</label>
                                <?php if(isset($error['duration'])):?>
                                <div>
                                <span class="error"><?= $error['duration']?></span>
                                </div>
                                <?php endif ?>
                            </div>
                            <input type="time" name="duration" <?php if($pelicula->duration!=''){
                                echo 'value="'.$pelicula->duration.'"';
                            }?>>
                        </div>
                        <div>
                            <div>
                                <label class="label-form-g" for="">Date</label>
                                <?php if(isset($error['date'])):?>
                                <div>
                                <span class="error"><?= $error['date']?></span>
                                </div>
                                <?php endif ?>
                            </div>
                            <input type="date" name="date" <?php if($pelicula->date!=''){
                                echo 'value="'.$pelicula->date.'"';
                            }?>>
                        </div>
                        <div>
                            <div>
                                <label class="label-form-g" for="">Active</label>
                                <?php if(isset($error['active'])):?>
                                <div>
                                <span class="error"><?= $error['active']?></span>
                                </div>
                                <?php endif ?>
                            </div>
                            <input type="txt" name="active" <?php if($pelicula->active!=''){
                                echo 'value="'.$pelicula->active.'"';
                            }?>>
                        </div>
                    </div>
                    <div class="col-6">
                        <div>
                            <div>
                                <label class="label-form-g" for="">Language</label>
                                <?php if(isset($error['language'])):?>
                                <div>
                                <span class="error"><?= $error['language']?></span>
                                </div>
                                <?php endif ?>
                            </div>
                            <input type="txt" name="language" <?php if($pelicula->language!=''){
                                echo 'value="'.$pelicula->language.'"';
                            }?>>
                        </div>
                        <div>
                            <div>
                                <label class="label-form-g" for="">Classification</label>
                                <?php if(isset($error['classification'])):?>
                                <div>
                                <span class="error"><?= $error['classification']?></span>
                                </div>
                                <?php endif ?>
                            </div>
                            <input type="txt" name="classification" <?php if($pelicula->classification!=''){
                                echo 'value="'.$pelicula->classification.'"';
                            }?>>
                        </div>
                        <div>
                            <div>
                                <label class="label-form-g" for="">Genre</label>
                                <?php if(isset($error['genre'])):?>
                                <div>
                                <span class="error"><?= $error['genre']?></span>
                                </div>
                                <?php endif ?>
                            </div>
                            <div class="select-container">
                                <div class="select-btn">
                                    <span class="btn-text">Select Genre</span>
                                    <span class="arrow-dwn">
                                        <i class="fa-solid fa-chevron-down"></i>
                                    </span>
                                </div>

                                <ul class="select-list-items">
                                    <?php foreach(getAllGenres() as $genre): ?>
                                    <li class="select-item ">
                                        <label class="select-item-text">
                                            <input name="genre[]" type="checkbox" value="<?=$genre['id']?>" class="checkbox
                                            <?php
                                                if($pelicula->genres!=[]){
                                                    foreach ($pelicula->genres as $key => $value) {
                                                        if($value==$genre['id']){
                                                            echo ' checked';
                                                        }
                                                    }
                                                }
                                            ?>"
                                            <?php
                                                if($pelicula->genres!=[]){
                                                    foreach ($pelicula->genres as $key => $value) {
                                                        if($value==$genre['id']){
                                                            echo ' checked ';
                                                        }
                                                    }
                                                }
                                            ?>
                                            ><span><?=$genre['name']?></span>
                                        </label>
                                    </li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <div>
                                <label class="label-form-g" for="">Rating</label>
                                <?php if(isset($error['rating'])):?>
                                <div>
                                <span class="error"><?= $error['rating']?></span>
                                </div>
                                <?php endif ?>
                            </div>
                            <input type="txt" name="rating"  <?php if($pelicula->rating!=''){
                                echo 'value="'.$pelicula->rating.'"';
                            }?>>
                        </div>
                        <div>
                            <div>
                                <label class="label-form-g" for="">Format</label>
                                <?php if(isset($error['format'])):?>
                                <div>
                                <span class="error"><?= $error['format']?></span>
                                </div>
                                <?php endif ?>
                            </div>
                            <select name="format">
                                <?php foreach(getAllFormats() as $format):?>
                                <option value="<?= $format['id']?>" <?php if($pelicula->format==$format['id']){
                                echo 'selected';
                                }
                            ?>><?=$format['name']?></option>
                                <?php endforeach?>
                            </select>
                        </div>
                        <div>
                            <div>
                                <label class="label-form-g" for="">Stock</label>
                                <?php if(isset($error['stock'])):?>
                                <div>
                                <span class="error"><?= $error['stock']?></span>
                                </div>
                                <?php endif ?>
                            </div>
                            <input type="number" name="stock" <?php if($pelicula->stock!=''){
                                echo 'value="'.$pelicula->stock.'"';
                            }?>>
                        </div>
                        <div>
                            <div>
                                <label class="label-form-g" for="">Price</label>
                                <?php if(isset($error['price'])):?>
                                <div>
                                <span class="error"><?= $error['price']?></span>
                                </div>
                                <?php endif ?>
                            </div>
                            <input type="number" name="price" <?php if($pelicula->price!=''){
                                echo 'value="'.$pelicula->price.'"';
                            }?>>
                        </div>
                    </div>
                    <div class="col-12 ">
                        <button type="submit" class="btn-g btn-form" name="btn" value="<?=$pelicula->id?>">Guardar</button>
                    </div>
                    </div>
                    <div class="col-5 form-right">
                        <h2 style="text-align: center; padding-bottom:10px;">Seleccionar</h2>
                        <?php if(isset($error['actor'])):?>
                        <div>
                        <span class="error"><?= $error['actor']?></span>
                        </div>
                        <?php endif ?>
                        <label class="label-form-g">Director</label>
                        <div class="col-12 carousel">
                            <button class="pre-btn" type="button"><i class="fa-solid fa-chevron-left"></i></button>
                            <button class="next-btn" type="button"><i class="fa-solid fa-chevron-left"></i></button>
                            <div class="carousel-container">
                                <?php foreach (getAllDirectores() as $director): ?>
                                <div class="carousel-card ">
                                    <label class="custom-radio">
                                        <input type="radio" name="principal" value="<?= $director['id']?>" <?php 
                                            if($pelicula->principal==$director['id']){
                                            echo 'checked';
                                            }
                                        ?>>
                                        <div class="radio-btn">
                                            <div class="content-radio">
                                                <div class="profile-img-input">
                                                    <img src="<?=$director['image']?>" alt="" >
                                                </div>
                                                <h2><?=$director['name']?></h2>
                                                <span class="skill-g">Director</span>
                                                <span class="check-icon">
                                                    <span class="icon"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <?php endforeach?>
                            </div>
                        </div>
                        <div class="col-12 actores">
                        <label class="label-form-g">Actores</label>
                        <div class="col-12 carousel">
                            <button class="pre-btn" type="button"><i class="fa-solid fa-chevron-left"></i></button>
                            <button class="next-btn" type="button"><i class="fa-solid fa-chevron-left"></i></button>
                            <div class="carousel-container">
                                <?php foreach (getAllActores() as $actor): ?>
                                <div class="carousel-card ">
                                    <label class="custom-radio">
                                        <input type="checkbox" name="actor[]" value="<?= $actor['id']?>"
                                        <?php
                                                if($pelicula->actores!=[]){
                                                    foreach ($pelicula->actores as $key => $value) {
                                                        if($value==$actor['id']){
                                                            echo ' checked ';
                                                        }
                                                    }
                                                }
                                            ?>>
                                        <div class="radio-btn">
                                            <div class="content-radio">
                                                <div class="profile-img-input">
                                                    <img src="<?=$actor['image']?>" alt="" >
                                                </div>
                                                <h2><?=$actor['name']?></h2>
                                                <span class="skill-g">Actor</span>
                                                <span class="check-icon">
                                                    <span class="icon"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <?php endforeach?>
                            </div>
                        </div>
                        </div>
                    </div>
                </form>
        </div>
    </div>
    <script>
        const carouselContainer=[...document.querySelectorAll('.carousel-container')];
        const nextBtn=[...document.querySelectorAll('.next-btn')];
        const preBtn=[...document.querySelectorAll('.pre-btn')];
        const carouselItem=[...document.querySelectorAll('.carousel-card')];
        carouselContainer.forEach((item, i)=>{
            let itemsDimensions=carouselItem[0].getBoundingClientRect();
            let containerWidth=itemsDimensions.width;
            nextBtn[i].addEventListener('click', ()=>{
                item.scrollLeft+=containerWidth+11;
            });
            preBtn[i].addEventListener('click',()=>{
                item.scrollLeft-=containerWidth+11;
            })
        });

        // script select
        const selectBtn = document.querySelector(".select-btn"),
        items = document.querySelectorAll(".checkbox");

        selectBtn.addEventListener("click", () => {
            selectBtn.classList.toggle("open");
        });
        window.addEventListener("load",()=>{
                let checked = document.querySelectorAll(".checked"),
                    btnText = document.querySelector(".btn-text");
                    if(checked && checked.length > 0){
                        btnText.innerText = `${checked.length} Selected`;
                    }else{
                        btnText.innerText = "Select Genre";
                    }
            })
        items.forEach(item => {
            item.addEventListener("focus", () => {
                let input=item.querySelector(".checkbox")
                item.classList.toggle("checked");

                let checked = document.querySelectorAll(".checked"),
                    btnText = document.querySelector(".btn-text");
                    if(checked && checked.length > 0){
                        btnText.innerText = `${checked.length} Selected`;
                    }else{
                        btnText.innerText = "Select Genre";
                    }
            });
        })
    </script>
<?php

?>