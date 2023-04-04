<?php
    require_once 'lib/genreService.php';
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        deleteGenre($id);
    }
?>

<div class="page">
    <div class="row ">
        <div class="col-6 ms-5">
            <form action="/formGenre" method="get"><button type="submit" class="btn-g btn-form">Agregar</button></form>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-11">
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Activo</th>
                <th scope="col"><i class="fa-solid fa-file-pen"></i></th>
                <th scope="col"><i class="fa-solid fa-trash"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach(getAllGenres() as $genre):?>
                <tr>
                <th scope="row"><?=$genre['id']?></th>
                <td><?=$genre['name']?></td>
                <td><?=$genre['active']?></td>
                <td class="options"><a href="/formGenre?id=<?=$genre['id']?>&&accion=Modificar"><i class="fa-solid fa-marker"></i></a></td>
                <td class="options"><a href="/listGenres?id=<?=$genre['id']?>"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        </div>
    </div>
</div>