<?php

session_start();

$productos = [
    ['id' => 11, 'nombre' => 'Camiseta', 'precio' => 15],
    ['id' => 22, 'nombre' => 'Pantalón', 'precio' => 29],
    ['id' => 33, 'nombre' => 'Zapatos', 'precio' => 49],
    ['id' => 44, 'nombre' => 'Sombrero', 'precio' => 12],
    ['id' => 55, 'nombre' => 'Bufanda', 'precio' => 9]
];

if (isset($_POST["cantidad"])) {
    $id = $_POST["id"];
    $cantidad = $_POST["cantidad"];
    $datos = [];

    foreach ($productos as $producto) {
        if ($producto['id'] == $id) {
            $datos = $producto;
            $datos["cantidad"] = $cantidad;
        }
    }

    if (isset($_SESSION["carrito"][$id])) {
        if ($cantidad == 0) {
            unset($_SESSION["carrito"][$id]);
        }else {
            $_SESSION["carrito"][$id]["cantidad"] = $cantidad;
        }
        
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/simpledotcss/simple.min.css">

</head>

<body>
    <?php
    $form = "";

    foreach ($_SESSION["carrito"] as $id => $datos) {
        $form .=   "<form method='post'>
                    <p>".$datos['nombre']." - ".$datos['precio']."€</p>
                        <input type='number' name='cantidad' min='0' value='".$datos['cantidad']."'>
                        <button type='submit'>Editar</button>
                        <input type='hidden' name='id' value='".$id."'>
                    </form>";
    }
    echo $form;
    ?>
    <a href="productos.php">Volver a productos</a>
    <a href="logout.php">Cerrar sesión</a>
</body>

</html>