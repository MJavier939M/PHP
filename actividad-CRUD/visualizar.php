<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

    function obtenerDatosCSV($archivo)
{
    $datos = [];

    $openArchivo = fopen($archivo, "r");

    if ($openArchivo == true) {

        $cabeceras = fgetcsv($openArchivo); // Obtiene la primera fila del archivo (recordemos que fgetcsv() obtiene una sola fila del archivo)

        while (($fila = fgetcsv($openArchivo)) == true) { // Mientras haya filas en el archivo continua el bucle

            $datos[] = array_combine($cabeceras, $fila);
            
        }

        fclose($openArchivo);
    }
    return $datos;
}

$datos = obtenerDatosCSV("usuarios.csv");

$usuario = null;

    foreach ($datos as $dato) {
        if ($dato['id_usuario'] == $_GET['id_usuario']) {
            $usuario = $dato;
            break;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
</head>
<body>
    <div>
        <p>Nombre: <?php echo $usuario['nombre'] ?></p>
        <p>Edad: <?php echo $usuario['edad'] ?></p>
        <p>Curso: <?php echo $usuario['curso'] ?></p>
        <a href="index.php">Volver</a>
    </div>
</body>
</html>