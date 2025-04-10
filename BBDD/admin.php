<?php

require_once 'conexion.php';

if (isset($_POST["sql"])) {
    $archivo = $_FILES['archivo']['tmp_name'];
    
    $content =  file_get_contents($archivo);

    $consultas = explode(";",$content);

    foreach ($consultas as $consulta) {
        $consulta = trim($consulta);

        if (!empty($consulta)) {
            $conexion -> query($consulta);    
            
        }
        
    }
    echo "Base de datos importada correctamente";
    
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
    <form method="post" enctype="multipart/form-data">
        <label for="archivo">Archivo</label>
        <input type="file" name="archivo" accept=".sql" required>
        <button type="submit" name="sql">Enviar</button>
    </form>
</body>
</html>