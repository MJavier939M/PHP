<?php

session_start();

$usuarios = [
    1 => ["nombre" => "Javier", "contraseña" => "1234"],
    2 => ["nombre" => "Jose", "contraseña" => "4321"],
    3 => ["nombre" => "Alejandro", "contraseña" => "1254"],
];

if (isset($_POST["nombre"]) && isset($_POST["contraseña"])) {
    $username = $_POST["nombre"];
    $password = $_POST["contraseña"];

    foreach ($usuarios as $usuario) {
        if ($usuario["nombre"] == $username && $usuario["contraseña"] == $password) {
            $_SESSION["nombre"] = $usuario["nombre"];
      
            header("location: productos.php");
        }else {
            $mensaje = "<p>Usuario o contraseña incorrecto</p>";
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
    <form method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" required>
        <?php echo $mensaje ?? ""?>
        <label for="contraseña">contraseña</label>
        <input type="password" name="contraseña" required>
        <?php echo $mensaje ?? ""?>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>