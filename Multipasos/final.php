<?php

session_start();

if (isset($_POST["nombre"]) && isset($_POST["email"])) {
    $_SESSION["nombre"] = $_POST["nombre"];
    $_SESSION["email"] = $_POST["email"];   
    
}

if (isset($_FILES["foto"])) {
    $foto = $_FILES["foto"];
    $file_name = $_FILES["foto"]["name"];
    $tipo = $_FILES["foto"]["type"];

    
    if ($tipo !== "image/jpeg" && $tipo !== "image/png") {
        echo "El archivo no tiene un formato correcto";
        echo "<a href='paso4.php'>Volver</a>";
    }else {
        move_uploaded_file($_FILES["foto"]["tmp_name"], __DIR__ . "/uploads/$file_name");
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
    <p><?php echo $_SESSION["nombre"]?></p>
    <p><?php echo $_SESSION["email"]?></p>
    <p><?php echo $_SESSION["sexo"]?></p>
    <p><?php echo $_SESSION["musculos"]?></p>
    <p><?php echo $_SESSION["mejoras"]?></p>
    <?php if (!empty($file_name)) {
     echo "<img src='uploads/$file_name'>";   
    }?>
    <a href="paso4.php">Volver</a>
</body>
</html>