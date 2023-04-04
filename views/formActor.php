<?php
 require_once 'models/Persona.php';
 require_once 'lib/actorService.php';
 $error=[];
 foreach ($_REQUEST as $key => $value) {
    if ($_REQUEST[$key] == '') {
        $error[$key] = 'Error: El campo ' . $key . ' no puede estar vacio';
    }
 }
 $persona=new Persona();
 if(isset($_GET['id'])){
    $paramID=$_GET['id'];
    $persona->id=$paramID;
    foreach (getActor($paramID)[0] as $key => $value) {
        $persona->$key=$value;
    }
 }
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $persona->id=$_POST['btn'];
    $persona->name=$_POST['name']?:'';
    $persona->image=$_POST['image']?:'';
    if(count($error)<=0){
        if(isset($_GET['accion'])){
            updateActor($persona);
        }
        else{
            postActor($persona);
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
    ?><span> ACTOR</span></h1>
        <div class="row justify-content-center">
                <form action="/formActor<?php
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
                            <input type="text" name="name" <?php if($persona->name!=''){
                                echo 'value="'.$persona->name.'"';
                            }?>>
                        </div>
                        <div>
                            <div>
                                <label class="label-form-g" for="">Image</label>
                                <?php if(isset($error['image'])):?>
                                <div>
                                <span class="error"><?= $error['image']?></span>
                                </div>
                                <?php endif ?>
                            </div>
                            <input type="url" name="image" <?php if($persona->image!=''){
                                echo 'value="'.$persona->image.'"';
                            }?>>
                        </div>
                    <div class="col-12 ">
                        <div class="col-6">
                        <button type="submit" class="btn-g btn-form" name="btn" value="<?=$persona->id?>">Guardar</button></div>
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