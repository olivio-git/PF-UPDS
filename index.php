
<?php
// Cargar el archivo de configuración y la biblioteca de funciones
require_once('config.php');
require_once('./lib/db.php');

// Obtener la URL de la solicitud actual
$request_uri = $_SERVER['REQUEST_URI'];
// Obtener query || ruta con error
$parametro='';
for ($i=1; $i < strlen($request_uri); $i++) { 
    if($request_uri[$i]=='/'||$request_uri=='?'){
        $parametro=$request_uri[$i];
        break;
    }
}
// Enrutamiento de solicitudes a controladores
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Document</title>
</head>

<body>
  <div class="row">
    <div class="col-12">
      <?php
      require_once('views/navbar.php');
      ?>
    </div>
  </div>
    <?php
    
    if($request_uri=='/index.php'){
        require_once 'controllers/home.php';
    }
    elseif($request_uri=='/'){
        require_once 'controllers/home.php';
    }
    elseif($parametro=='/'){
        require_once ('controllers/'.explode('/',$request_uri)[2].'.php');
    }
    elseif($parametro=='?'){
        require_once ('controllers'.explode('?',$request_uri)[0].'.php?'.explode('?',$request_uri)[1]);
    }
    else{
        require_once 'controllers'.$request_uri.'.php';
    }
?>
    <div class="row">
    <div class="col-12">
        <?php
        require_once('views/footer.php')
        ?>
    </div>
  </div>


</body>

</html>









<!-- // Cargar el archivo de configuración y la biblioteca de funciones
require_once('config.php');
require_once('./lib/db.php');

// Obtener la URL de la solicitud actual
$request_uri = $_SERVER['REQUEST_URI'];

// Enrutamiento de solicitudes a controladores
switch ($request_uri) {
    case '/home':
        require_once('./controllers/home.php');
        break;
    case '/about':
        require_once('controllers/about.php');
        break;
    case '/contact':
        require_once('controllers/contact.php');
        break;
    case '/notfound':
        require_once('controllers/404.php');
        break;
    case '/FormMovie':
        require_once('controllers/formMovie.php');
        break;
    default:
    require_once('controllers/home.php');
    break;
    //luis12345678
}
?> -->

