<?php

require_once 'conexion.php';

$result = $conexion->query("SELECT c.*,a.nombre as nombre_artista, a.apellido as apellido_artista  FROM conciertos c JOIN artistas a ON c.id_artista = a.id");

$conciertos = [];

while ($fila = $result -> fetch_assoc()) {
    $conciertos[] = $fila;
}


var_dump($conciertos);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Lugar</th>
            <th>Fecha</th>
            <th>Artista</th>
        </tr>
        <?php foreach ($conciertos as $concierto) {?>
            <tr>
                <td> <?php echo $concierto["fecha"]?></td>
                <td> <?php echo $concierto["lugar"]?></td>
                <td> <?php echo $concierto["nombre_artista"] . $concierto["apellido_artista"]?></td>
                <td><a href="borrar_concierto.php?id=<?php echo $concierto['id']?>">Borrar</a></td>
                <td><a href="editar_concierto.php?id=<?php echo $concierto['id']?>">Editar</a></td>
            </tr>
            <?php } ?>
    </table>
    <a href="añadir_conciertos.php">Añadir</a>
</body>
</html>