<?php
include_once("app/functions.php");
$productos = getProductos();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <title>Productos</title>
</head>
<body>

    <h1>Productos</h1>
    <h2>Bienvenido <?php echo $_SESSION["nombre"]; ?></h2>
    <h3>Lista de productos</h3>

    <?php
    $productos = getProductos();
    mostrarProductos($productos);
    ?>

    <br>
        <a href="index.php">Volver</a>
        <a href="carrito.php">Ver carrito</a>
</body>
</html>