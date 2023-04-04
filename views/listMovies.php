<?php
    require_once 'lib/peliculasService.php';
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        deletePelicula($id);
    }
?>

<div class="page">
    <div class="row ">
        <div class="col-6 ms-5">
            <form action="/formMovie" method="get"><button type="submit" class="btn-g btn-form">Agregar</button></form>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-11">
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Lenguaje</th>
                <th scope="col">Duracion</th>
                <th scope="col">Fecha</th>
                <th scope="col">Clasificacion</th>
                <th scope="col">Rating</th>
                <th scope="col">Formato</th>
                <th scope="col">Stock</th>
                <th scope="col">Precio</th>
                <th scope="col">Poster</th>
                <th scope="col"><i class="fa-solid fa-book"></i></i></th>
                <th scope="col"><i class="fa-solid fa-file-pen"></i></th>
                <th scope="col"><i class="fa-solid fa-trash"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach(getAllPeliculas() as $pelicula):?>
                <tr>
                <th scope="row"><?=$pelicula['id']?></th>
                <td style="max-width: 150px;"><?=$pelicula['name']?></td>
                <td class="text-truncate" style="max-width: 150px;"><?=$pelicula['description']?></td>
                <td><?=$pelicula['language']?></td>
                <td><?=$pelicula['duration']?></td>
                <td><?=$pelicula['date']?></td>
                <td><?=$pelicula['classification']?></td>
                <td><?=$pelicula['rating']?></td>
                <td><?=$pelicula['format']?></td>
                <td><?=$pelicula['stock']?></td>
                <td><?=$pelicula['price']?></td>
                <td><img src="<?=$pelicula['poster']?>" alt="" width="80px" height="110px"></td>
                <td class="options"><i class="fa-solid fa-eye"></i></td>
                <td class="options"><a href="/formMovie?id=<?=$pelicula['id']?>&&accion=Modificar"><i class="fa-solid fa-marker"></i></a></td>
                <td class="options"><a href="/listMovies?id=<?=$pelicula['id']?>"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        </div>
    </div>
</div>