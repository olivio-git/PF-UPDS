<?php
 require_once 'models/Genre.php';
 require_once 'lib/genreService.php';
 $error=[];
 foreach ($_REQUEST as $key => $value) {
    if ($_REQUEST[$key] == '') {
        $error[$key] = 'Error: El campo ' . $key . ' no puede estar vacio';
    }
 }
 $genre=new Genre();
 if(isset($_GET['id'])){
    $paramID=$_GET['id'];
    $genre->id=$paramID;
    foreach (getGenre($paramID)[0] as $key => $value) {
        $genre->$key=$value;
    }
 }
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $genre->id=$_POST['btn'];
    $genre->name=$_POST['name']?:'';
    $genre->active=$_POST['active']?:'';
    if(count($error)<=0){
        if(isset($_GET['accion'])){
            updateGenre($genre);
        }
        else{
            postGenre($genre);
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
    ?><span> GENERO</span></h1>
        <div class="row justify-content-center">
                <form action="/formGenre<?php
                    if(isset($_GET['accion'])){
                        echo '?accion=Modificar';
                    }
                ?>" method="post" class="form-container col-6">
                    <div class="col-12 form-left">
                    <div class="col-12 colum-inputs">
                        <div>
                            <div>
                                <label class="label-form-g" for="">Name</label>
                                <?php if(isset($error['name'])):?>
                                <div>
                                <span class="error"><?= $error['name']?></span>
                                </div>
                                <?php endif ?>
                            </div>
                            <input type="text" name="name" <?php if($genre->name!=''){
                                echo 'value="'.$genre->name.'"';
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
                            <input type="text" name="active" <?php if($genre->active!=''){
                                echo 'value="'.$genre->active.'"';
                            }?>>
                        </div>
                    <div class="col-12 ">
                        <div class="col-6">
                        <button type="submit" class="btn-g btn-form" name="btn" value="<?=$genre->id?>">Guardar</button></div>
                        <div class="col-6">
                        <button type="reset" class="btn-g btn-form">Reset</button></div>
                    </div>
                    </div>
                    </div>
                </form>
        </div>
    </div>
<?php

?>