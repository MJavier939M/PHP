<?php

require_once 'conexion.php';

if (isset($_GET["id"])) {
    $id = intval($_GET["id"]);

    $sql = "SELECT * FROM artistas WHERE id = $id";
    $result = $conexion -> query($sql);
    $artista = $result -> fetch_assoc();

}

if (isset($_POST["actualizar"])) {
    $nombre = $_POST["nombre"];    
    $apellido = $_POST["apellido"];    
    $estilo = $_POST["estilo"];    
    $id = $_GET["id"];

    $sql = "UPDATE artistas SET nombre = '$nombre', apellido = '$apellido', estilo = '$estilo' WHERE id = $id";

    if ($conexion -> query($sql) === true) {
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
        <input type="text" name="nombre" value="<?php echo $artista["nombre"]?>" required>
        <label for="apellido">apellido</label>
        <input type="text" name="apellido" value="<?php echo $artista["apellido"]?>" required>
        <label for="estilo">estilo</label>
        <input type="text" name="estilo" value="<?php echo $artista["estilo"]?>" required>
        <button type="submit" name="actualizar">Enviar</button>
    </form>
</body>
</html>