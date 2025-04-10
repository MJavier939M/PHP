<?php
session_start();

if (!isset($_SESSION["nombre"])) {
    header("location: index.php");
}

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
        $_SESSION["carrito"][$id] += $cantidad;
    }else {
        $_SESSION["carrito"][$id] = $cantidad;
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
        <?php foreach ($productos as $producto) {?>
            <form method="post">
                <p><?php echo $producto["nombre"]?> - <?php echo $producto["precio"]?>€</p>
                <button type="button" onclick="restar(<?php echo $producto['id']?>)">-</button>
                <input type="number" name="cantidad" min="0" value="0" id="<?php echo $producto['id']?>">
                <button type="button" onclick="sumar(<?php echo $producto['id']?>)">+</button>
                <input type="hidden" name="id" value="<?php echo $producto['id']?>">
                <button type="submit">Añadir</button>
            </form>            
        <?php }?>

        <a href="carrito.php">Ver carrito</a>
</body>
            <script>
                function sumar(id) {
                    let input = document.getElementById(id);
                    input.value = parseInt(input.value) + 1;
                }
                    
                function restar(id) {
                    let input = document.getElementById(id);
                    if (input.value > 0) {
                        input.value = parseInt(input.value) - 1;
                    }
                }
            </script>
</html>