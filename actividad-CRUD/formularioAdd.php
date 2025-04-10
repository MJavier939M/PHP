<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Nuevo Registro</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
</head>
<body>
    <h1>Añadir Nuevo Registro</h1>
    <form method="post" action="operaciones.php">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" required>
        <label for="curso">Curso:</label>
        <input type="text" id="curso" name="curso" required>
        <button type="submit" name="añadir" class="action-btn">Añadir</button>
    </form>
    <a href="index.php" class="action-btn">Volver a la lista</a>
</body>
</html>