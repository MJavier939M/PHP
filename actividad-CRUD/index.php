<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

function obtenerDatosCSV($archivo)
{
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

$datos = obtenerDatosCSV("usuarios.csv");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Registros</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
</head>
<body>
    <h1>Lista de Registros</h1>
    <a href="formularioAdd.php" class="action-btn">Añadir nuevo registro</a>

    <form id="operacion-form" method="post" action="operaciones.php">
        <label for="operacion">Seleccionar operación:</label>
        <select id="operacion" name="operacion">
            <option value="eliminar">Eliminar</option>
            <option value="editar">Editar</option>
        </select>
        <button type="submit" class="action-btn">Aplicar a seleccionados</button>
        <table>
            <thead>
                <tr>
                    <th>Seleccionar</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Curso</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $dato) {
                    echo "<tr>";
                    echo "<td><input type='checkbox' name='registro[]' value='{$dato['id_usuario']}'></td>";
                    echo "<td>{$dato['nombre']}</td>";
                    echo "<td>{$dato['edad']}</td>";
                    echo "<td>{$dato['curso']}</td>";
                    echo "<td><a href='visualizar.php?id_usuario={$dato['id_usuario']}'>Ver</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </form>
</body>
</html>