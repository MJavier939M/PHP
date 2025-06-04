<?php

require_once 'conexion.php';


if (isset($_POST["añadir"]) && !empty($_POST["añadir"])) {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $estilo = $_POST["estilo"];

    $sql = "INSERT INTO artistas (nombre,apellido,estilo) VALUES (':nombre',':apellido',':estilo')";
    
    if ($conexion -> prepare($sql) === true) {
        header("location: artistas.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" required>
        <label for="apellido">apellido</label>
        <input type="text" name="apellido" required>
        <label for="estilo">estilo</label>
        <input type="text" name="estilo" required>
        <button type="submit" name="añadir">Enviar</button>
    </form>
</body>
</html>