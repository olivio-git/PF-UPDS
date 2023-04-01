<?php
 require_once 'lib/directorService.php';
 require_once 'lib/formatService.php';
 require_once 'models/Pelicula.php';
 $error=[];
 foreach ($_REQUEST as $key => $value) {
    if ($_REQUEST[$key] == '' || $_REQUEST[$key] == []) {
        $error[$key] = 'Error: El campo ' . $key . ' no puede estar vacio';
    }
 }
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pelicula=new Pelicula();
    $pelicula->name=$_POST['name'];
    $pelicula->portada=$_POST['portada'];
    $pelicula->poster=$_POST['poster'];
    $pelicula->description=$_POST['description'];
    $pelicula->duration=$_POST['duration'];
    $pelicula->date=$_POST['date'];
    $pelicula->active=$_POST['active'];
    $pelicula->language=$_POST['language'];
    $pelicula->classification=$_POST['classification'];
    $pelicula->principal=$_POST['principal'];
    $pelicula->rating=$_POST['rating'];
    $pelicula->format=$_POST['format'];
    $pelicula->stock=$_POST['stock'];
    $pelicula->price=$_POST['price'];
 }
?>

<div class="page">
    <h1 class="form-title">AGREGAR <span>PELICULA</span></h1>
        <div class="row justify-content-center">
                <form action="/FormMovie" method="post" class="form-container col-9">
                    <div class="col-8 form-left">
                    <div class="col-6">
                        <div>
                            <div>
                                <label class="label-form" for="">Name</label>
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
                                <label class="label-form" for="">Portada</label>
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
                                <label class="label-form" for="">Poster</label>
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
                                <label class="label-form" for="">Description</label>
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
                                <label class="label-form" for="">Duration</label>
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
                                <label class="label-form" for="">Date</label>
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
                                <label class="label-form" for="">Active</label>
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
                                <label class="label-form" for="">Language</label>
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
                                <label class="label-form" for="">Classification</label>
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
                                <label class="label-form" for="">Director</label>
                                <?php if(isset($error['principal'])):?>
                                <div>
                                <span class="error"><?= $error['principal']?></span>
                                </div>
                                <?php endif ?>
                            </div>
                            <select name="principal">
                                <?php foreach(getAllDirectores() as $director):?>
                                <option value="<?= $director['id']?>" <?php if($pelicula->principal==$director['id']){
                                echo 'selected';
                                }
                            ?>><?=$director['name']?></option>
                                <?php endforeach?>
                            </select>
                        </div>
                        <div>
                            <div>
                                <label class="label-form" for="">Rating</label>
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
                                <label class="label-form" for="">Format</label>
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
                                <label class="label-form" for="">Stock</label>
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
                                <label class="label-form" for="">Price</label>
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
                        <button type="submit" class="btn btn-form">Agregar</button>
                    </div>
                    </div>
                    <div class="col-4 form-right">

                    </div>
                </form>
        </div>
    </div>
<?php

?>