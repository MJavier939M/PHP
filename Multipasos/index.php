<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="paso2.php">
        <select name="sexo" id="sexo">
            <option value="hombre">Hombre</option>
            <option value="mujer">Mujer</option>
        </select>
        <button type="submit">Siguiente</button>
    </form>
</body>
</html>