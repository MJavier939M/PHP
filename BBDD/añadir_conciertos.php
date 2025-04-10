<?php

require_once 'conexion.php';

if (isset($_POST["añadir"])) {
    $lugar = $_POST["lugar"];
    $fecha = $_POST["fecha"];
    $artistas = $_POST["artistas"];

    $sql = "INSERT INTO conciertos (lugar,fecha,id_artista) VALUES ('$lugar','$fecha','$artistas')";

    if ($conexion -> query($sql) === true) {
        header("location: conciertos.php");
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
        <label for="lugar">Lugar</label>
        <input type="text" name="lugar" required>
        <label for="fecha">fecha</label>
        <input type="date" name="fecha" required>
        <select name="artistas">
            <?php
            $result = $conexion->query("SELECT * FROM artistas");

            
            while ($fila = $result -> fetch_assoc()) {
                echo "<option value='{$fila['id']}'>{$fila['nombre']} {$fila['apellido']}</option>";
            }
            ?>
        </select>
        <button type="submit" name="añadir">Enviar</button>
    </form>
</body>
</html>