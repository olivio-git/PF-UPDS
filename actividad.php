<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $directorio="tmp";
    // mkdir($directorio);
        touch("./tmp/holis.pdf");
    // touch("./tmp/holamundo.docx");
    $archivos = scandir($directorio);
    $num=count($archivos);
    echo "La cantidad de archivos en el directorio ".$directorio." son: ".$num-2;


    echo"<br>";
    echo"<br>";
    $pdfs = glob($directorio . "/*.pdf");
    $num_pdfs = count($pdfs);
    echo "El directorio $directorio contiene $num_pdfs archivos PDF.";
    echo"<br>";
    echo"<br>";
    $pdfs = glob($directorio . "/*.txt");
    $num_pdfs = count($pdfs);
    echo "El directorio $directorio contiene $num_pdfs archivos TXT.";
    echo"<br>";
    echo"<br>";
    $pdfs = glob($directorio . "/*.docx");
    $num_pdfs = count($pdfs);
    echo "El directorio $directorio contiene $num_pdfs archivos DOCX.";
    echo"<br>";
    echo"<br>";
    $pdfs = glob($directorio . "/*.jpeg");
    $num_pdfs = count($pdfs);
    echo "El directorio $directorio contiene $num_pdfs archivos JPEG.";
    echo"<br>";
    echo"<br>";

    $conent=file_get_contents("tmp/holamundo.txt");
    echo '<h1>'.$conent.'</h1>'; 

    $a = scandir("tmp");;

    foreach ($a as $key => $value) {
       echo$value."<br>";
    }
    ?>
</body>

</html>