<?php

session_start();

if (isset($_POST["sexo"])) {
    $_SESSION["sexo"] = $_POST["sexo"];
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
    <form method="POST" action="paso3.php">
        <select name="musculos" id="musculos">
            <option value="biceps">biceps</option>
            <option value="triceps">triceps</option>
            <option value="cuadriceps">cuadriceps</option>
        </select>
        <button type="submit">ENVIAR</button>
        <a href="index.php">Volver</a>
    </form>
</body>
</html>