<?php


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


// Obtener los datos de los archivos CSV
$usuarios = obtenerDatosCSV("usuarios.csv");


// function obtenerUsuarioPorId($usuarios, $id)
// {
//     foreach ($usuarios as $usuario) {
//         if ($usuario['id_usuario'] == $id) {
//             return $usuario;
//         }
//     }
//     return null;
// }

// $usuario = obtenerUsuarioPorId($usuarios, $_GET['id_usuario']);

foreach ($usuarios as $usuario) {
    if ($usuario['id_usuario'] == $_GET['id_usuario']) {
        $dato = $usuario;
    }
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css" />
</head>

<body>
    <h1>Editar Usuario</h1>

    <form method="POST" action="operaciones.php">
        <input type="hidden" name="id_usuario" value="<?php echo $dato['id_usuario'] ?>" />
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required value="<?php echo $dato['nombre'] ?>" />

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" required value="<?php echo $dato['edad'] ?>" />

        <label for="curso">Curso:</label>

        <select id="curso" name="curso" required>
            <option value="PHP Avanzado" <?php if ($dato['curso'] == 'PHP Avanzado') echo 'selected'; ?>>PHP Avanzado</option>
            <option value="HTML y CSS" <?php if ($dato['curso'] == 'HTML y CSS') echo 'selected'; ?>>HTML y CSS</option>
            <option value="JavaScript" <?php if ($dato['curso'] == 'JavaScript') echo 'selected'; ?>>JavaScript</option>
        </select>
        <br />
        <br />
        <button type="submit" class="action-btn" name="editarRegistro">Editar</button>
    </form>
</body>

</html>