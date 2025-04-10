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

    if (isset($_SESSION["carrito"][$id])) {
        if ($cantidad == 0) {
            unset($_SESSION["carrito"][$id]);
        }else {
            $_SESSION["carrito"][$id] = $cantidad;
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
</head>

<body>
    <?php
    foreach ($_SESSION["carrito"] as $id => $cantidad) {
        foreach ($productos as $producto) {
            if ($producto["id"] == $id) { ?>
                <form method="post">
                    <input type="number" name="cantidad" min="0" value="<?php echo $cantidad?>">
                    <?php echo "{$producto['nombre']} - {$producto['precio']}€" ?>;
                    <button type="submit">Editar</button>
                    <input type="hidden" name="id" value="<?php echo $producto['id']?>">
                </form>
    <?php
            }
        }
        echo " - $cantidad unidades<br>";
    }
    ?>
    <a href="productos.php">Volver a productos</a>
    <a href="logout.php">Cerrar sesión</a>
</body>

</html>