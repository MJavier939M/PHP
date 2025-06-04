<?php

require_once 'conexion.php';

$result = $conn->prepare("SELECT * FROM artistas");
$result->execute();

$artistas = $result->fetchAll(PDO::FETCH_ASSOC);

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
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Estilo</th>
        </tr>
        <?php foreach ($artistas as $artista) {?>
            <tr>
                <td> <?php echo $artista["nombre"]?></td>
                <td> <?php echo $artista["apellido"]?></td>
                <td> <?php echo $artista["estilo"]?></td>
                <td><a href="borrar_artista.php?id=<?php echo $artista['id']?>">Borrar</a></td>
                <td><a href="editar_artista.php?id=<?php echo $artista['id']?>">Editar</a></td>
            </tr>
            <?php } ?>
    </table>
    <a href="añadir_artista.php">Añadir</a>
</body>
</html>