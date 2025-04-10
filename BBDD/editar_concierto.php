<?php

require_once 'conexion.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "SELECT * FROM conciertos WHERE id = $id";
    $result = $conexion -> query($sql);
    $concierto = $result -> fetch_assoc();

    var_dump($concierto);
}

if (isset($_POST['actualizar'])) {
    $lugar = $_POST['lugar'];
    $fecha = $_POST['fecha'];
    $artista = $_POST['artistas'];
    $id = $_GET['id'];

    $sql = "UPDATE conciertos SET lugar = '$lugar', fecha = '$fecha', id_artista = '$artista' WHERE id = $id";

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
        <input type="text" value= "<?php echo $concierto['lugar']?>" name="lugar" required>
        <label for="fecha">fecha</label>
        <input type="date" name="fecha" value="<?php echo $concierto['fecha']?>" required>
        <select name="artistas">
        <?php
            $result = $conexion->query("SELECT * FROM artistas");

            
            while ($fila = $result -> fetch_assoc()) {
                if ($fila['id'] == $concierto['id_artista']) {
                    echo "<option selected value='{$fila['id']}'>{$fila['nombre']} {$fila['apellido']}</option>";

                }else {
                    echo "<option value='{$fila['id']}'>{$fila['nombre']} {$fila['apellido']}</option>";
                }
            }
            ?>
        </select>
        <button type="submit" name="actualizar">Enviar</button>
    </form>
</body>
</html>