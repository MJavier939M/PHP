<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="procesar.php" method="post">
    <?php echo $tabla?>
    <button type="submit">Guardar vuelos seleccionados</button>
    </form>
    <form method="post">
        <label for="destino">Destino</label>
        <input type="text" name="destino">
        <input type="date" name="fecha">
        <button type="submit" name="filtrar">Filtrar</button>
    </form>
</body>
</html>