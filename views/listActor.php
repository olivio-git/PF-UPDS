<?php
    require_once 'lib/actorService.php';
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        deleteActor($id);
    }
?>

<div class="page">
    <div class="row ">
        <div class="col-6 ms-5">
            <form action="/formActor" method="get"><button type="submit" class="btn-g btn-form">Agregar</button></form>
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
                <?php foreach(getAllActores() as $actor):?>
                <tr>
                <th scope="row"><?=$actor['id']?></th>
                <td><?=$actor['name']?></td>
                <td><img src="<?=$actor['image']?>" alt="" width="80px" height="110px"></td>
                <td class="options"><a href="/formActor?id=<?=$actor['id']?>&&accion=Modificar"><i class="fa-solid fa-marker"></i></a></td>
                <td class="options"><a href="/listActor?id=<?=$actor['id']?>"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        </div>
    </div>
</div>