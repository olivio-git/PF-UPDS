<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8"/>
      <meta name="description" content="Resumen del contenido de la página">   
      <title>EJERCICIO 16</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
   </head>
  <body>
  
    <?php
    $archivo="imagen.png";
    $carpeta="tmp/";
    if (file_exists($carpeta.$archivo)) {
        if (is_file($carpeta.$archivo)) {
            printf("<p>Si existe el archivo $archivo en la carpeta $carpeta</p>");
            $size=filesize($carpeta.$archivo);
            $creado=filectime($carpeta.$archivo);
            $modificado=filemtime($carpeta.$archivo);
            
            if ($size<=1024) {
                $medida="Bytes";
            }
            elseif ($size>=1024 && $size<1024000) {
                $medida="kiloBytes";
                $size=$size/1000;
            }
            else {
                $medida="MegaBytes";
                $size=$size/1000000;
            }
            $screado=date("d/m/Y H:i:s",$creado);
            $smodificado=date("d/m/Y H:i:s ",$modificado);
            printf("<br>Tamaño: $size $medida<br> Creado: $screado <br> Modificado: $smodificado ");
        }
        elseif (is_dir($carpeta.$archivo)) {
            printf("<p>Si existe la carpeta $carpeta</p>");
        } 
        else {
            printf("<p>NO se puede determinar si exite el archivo</p>");
        }  
       
        
    }
    else {
        printf("NO existe el archivo");
    }
    $dir=opendir($carpeta);
    while ($nombre=readdir($dir)) {
        printf("<br>$nombre");
    }
    $archi=scandir($carpeta);
    $archi1=scandir($carpeta,1);
    foreach ($arch as $key => $value) {
        printf("[$key]-> $value <br>");
    }
    foreach ($archi1 as $key => $value) {
        printf("[$key]-> $value <br>");
    }
    mkdir("tmp");
   ?>
    
  </body>
</html>