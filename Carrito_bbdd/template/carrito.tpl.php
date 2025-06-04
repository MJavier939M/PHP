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