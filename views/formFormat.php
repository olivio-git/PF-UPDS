<?php
 require_once 'models/Format.php';
 require_once 'lib/formatService.php';
 $error=[];
 foreach ($_REQUEST as $key => $value) {
    if ($_REQUEST[$key] == '') {
        $error[$key] = 'Error: El campo ' . $key . ' no puede estar vacio';
    }
 }
 $format=new Format();
 if(isset($_GET['id'])){
    $paramID=$_GET['id'];
    $format->id=$paramID;
    foreach (getFormat($paramID)[0] as $key => $value) {
        $format->$key=$value;
    }
 }
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $format->id=$_POST['btn'];
    $format->name=$_POST['name']?:'';
    if(count($error)<=0){
        if(isset($_GET['accion'])){
            updateFormat($format);
        }
        else{
            postFormat($format);
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
    ?><span> FORMATO</span></h1>
        <div class="row justify-content-center">
                <form action="/formFormat<?php
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
                            <input type="text" name="name" <?php if($format->name!=''){
                                echo 'value="'.$format->name.'"';
                            }?>>
                        </div>
                    <div class="col-12 ">
                        <div class="col-6">
                        <button type="submit" class="btn-g btn-form" name="btn" value="<?=$format->id?>">Guardar</button></div>
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