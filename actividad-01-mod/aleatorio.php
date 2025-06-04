<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 1 - Aleatorio</title>
        <link rel="stylesheet" href="https://unpkg.com/simpledotcss/simple.min.css">
</head>

<body>

    <?php

    //! TAREA 7:
    //! Copia y pega todo el codigo PHP de tabla.php y modifica la tabla para que muestre un producto aleatorio
    //* debes modificar la parte donde genera las filas de la tabla
    //* para obtener un producto aleatorio, usa la función array_rand()

    function obtenerDatosCSV($archivo)
    {
        $datos = [];
    
        $openArchivo = fopen($archivo, "r");
    
        if ($openArchivo == true) {
            $cabeceras = fgetcsv($openArchivo); // Obtiene la primera fila del archivo (cabeceras)
    
            while (($fila = fgetcsv($openArchivo)) == true) { // Mientras haya filas en el archivo, continúa el bucle
                $datos[] = array_combine($cabeceras, $fila); // Combina las cabeceras con los valores de la fila
            }
    
            fclose($openArchivo);
        }
        return $datos;
    }
    
    // Obtener los datos de los archivos CSV
    $pedidos = obtenerDatosCSV("pedidos.csv");
    $productos = obtenerDatosCSV("productos.csv");
    
    $productosAsociados = [];
    
    // Asociar los productos con los pedidos
    foreach ($pedidos as $pedido) {
        foreach ($productos as $producto) {
            if ($pedido['id_producto'] == $producto['id_producto']) {
                $productosAsociados[] = array_merge($pedido, $producto);
                break;
            }
        }
    }

 

    // Mostrar un producto aleatorio en una tabla
   if ($productosAsociados) { // Miramos si hay productos asociados
    $indiceAleatorio = array_rand($productosAsociados);
    
    $table = '<table>
    <thead>
        <th>id_pedido</th>
        <th>id_producto</th>
        <th>cliente</th>
        <th>cantidad</th>
        <th>fecha</th>
        <th>nombre</th>
        <th>categoria</th>
        <th>precio</th>
        <th>stock</th>
        <th>imagen</th>
    </thead>
    <tbody><tr>';

    // foreach ($productosAsociados[$indiceAleatorio] as $key => $valor) {

    //     if ($key == "imagen") {
    //         $table .= '<td><img src="'.$valor.'" width="100px" height="100px"></td>';
    //     }else {
    //          $table .= '<td>'.$valor.'</td>';
    //     }
       
    // }

     $table .= '
            <td>'.$productosAsociados[$indiceAleatorio]['id_pedido'].'</td>
            <td>'.$productosAsociados[$indiceAleatorio]['id_producto'].'</td>
            <td>'.$productosAsociados[$indiceAleatorio]['cliente'].'</td>
            <td>'.$productosAsociados[$indiceAleatorio]['cantidad'].'</td>
            <td>'.$productosAsociados[$indiceAleatorio]['fecha'].'</td>
            <td>'.$productosAsociados[$indiceAleatorio]['nombre'].'</td>
            <td>'.$productosAsociados[$indiceAleatorio]['categoria'].'</td>
            <td>'.$productosAsociados[$indiceAleatorio]['precio'].'</td>
            <td>'.$productosAsociados[$indiceAleatorio]['stock'].'</td>
            <td><img src="'.$productosAsociados[$indiceAleatorio]['imagen'].'" width="100px" height="100px"></td>
        ';

    $table .= '</tr></tbody></table>';

    echo $table;

} else {
    echo "<p>No hay datos</p>";
}

    ?>
<a href="index.php">Volver</a>
</body>

</html>