<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <title>Login</title>
</head>
<body>

    <h1>Login</h1>
    <h3>Inicia sesión para acceder a tu carrito</h3>
    <p>Si no tienes cuenta, puedes registrarte <a href="registro.php">aquí</a></p>
    <form method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" required>
        <?php echo $mensaje ?? "" ?>
        <label for="contrasena">Contraseña</label>
        <input type="password" name="contrasena" required>
        <?php echo $mensaje ?? "" ?>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
