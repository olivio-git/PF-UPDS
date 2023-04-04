<?php
    require_once 'lib/directorService.php';
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        deleteDirector($id);
    }
?>

<div class="page">
    <div class="row ">
        <div class="col-6 ms-5">
            <form action="/formDirector" method="get"><button type="submit" class="btn-g btn-form">Agregar</button></form>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-11">
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Imagen</th>
                <th scope="col"><i class="fa-solid fa-file-pen"></i></th>
                <th scope="col"><i class="fa-solid fa-trash"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach(getAllDirectores() as $director):?>
                <tr>
                <th scope="row"><?=$director['id']?></th>
                <td><?=$director['name']?></td>
                <td><img src="<?=$director['image']?>" alt="" width="80px" height="110px"></td>
                <td class="options"><a href="/formDirector?id=<?=$director['id']?>&&accion=Modificar"><i class="fa-solid fa-marker"></i></a></td>
                <td class="options"><a href="/listDirector?id=<?=$director['id']?>"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        </div>
    </div>
</div>