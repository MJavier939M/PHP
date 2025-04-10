<?php

session_start();

if (isset($_POST["mejoras"])) {
    $_SESSION["mejoras"] = $_POST["mejoras"];
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
    <form method="post" action="final.php" enctype="multipart/form-data">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre">
        <label for="email">Email</label>
        <input type="email" name="email">
        <label for="foto">Foto</label>
        <input type="file" accept="image/*" name="foto">
        <button type="submit">Visualizar</button>
        <a href="paso3.php">Volver</a>
    </form>
</body>
</html>