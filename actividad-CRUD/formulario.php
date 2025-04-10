<?php
function obtenerDatosCSV($archivo) {
    $datos = [];
    $openArchivo = fopen($archivo, "r");
    if ($openArchivo) {
        $cabeceras = fgetcsv($openArchivo);
        while (($fila = fgetcsv($openArchivo)) !== false) {
            $datos[] = array_combine($cabeceras, $fila);
        }
        fclose($openArchivo);
    }
    return $datos;
}

$usuarios = obtenerDatosCSV("usuarios.csv");
$dato = null;
foreach ($usuarios as $usuario) {
    if ($usuario['id_usuario'] == $_GET['id_usuario']) {
        $dato = $usuario;
        break;
    }
}
if (!$dato) {
    die("Usuario no encontrado.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css" />
</head>
<body>
    <h1>Editar Usuario</h1>
    <form method="POST" action="operaciones.php">
        <input type="hidden" name="operacion" value="editarRegistro">
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($dato['nombre']); ?>">
        <input type="text" name="edad" value="<?php echo htmlspecialchars($dato['edad']); ?>">
        <input type="text" name="curso" value="<?php echo htmlspecialchars($dato['curso']); ?>">
        <input type="hidden" name="id_usuario" value="<?php echo htmlspecialchars($dato['id_usuario']); ?>">
        <button type="submit">ENVIAR</button>
    </form>
</body>
</html>