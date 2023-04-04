<?php
    require_once 'lib/formatService.php';
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        deleteFormat($id);
    }
?>

<div class="page">
    <div class="row ">
        <div class="col-6 ms-5">
            <form action="/formFormat" method="get"><button type="submit" class="btn-g btn-form">Agregar</button></form>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-11">
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col"><i class="fa-solid fa-file-pen"></i></th>
                <th scope="col"><i class="fa-solid fa-trash"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach(getAllFormats() as $format):?>
                <tr>
                <th scope="row"><?=$format['id']?></th>
                <td><?=$format['name']?></td>
                <td class="options"><a href="/formFormat?id=<?=$format['id']?>&&accion=Modificar"><i class="fa-solid fa-marker"></i></a></td>
                <td class="options"><a href="/listFormat?id=<?=$format['id']?>"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        </div>
    </div>
</div>