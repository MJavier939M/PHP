<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 1 - Aleatorio</title>
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
    if ($productosAsociados) {
        // Obtener un índice aleatorio
        $indiceAleatorio = array_rand($productosAsociados);
        $productoAleatorio = $productosAsociados[$indiceAleatorio]; // Producto aleatorio
    
        echo "<table border='1'>";
    
        // Generar encabezados dinámicamente
        echo "<tr>";
        foreach ($productoAleatorio as $key => $value) {
            echo "<th>" . $key . "</th>";
        }
        echo "</tr>";
    
        // Generar fila para el producto aleatorio
        echo "<tr>";
        foreach ($productoAleatorio as $key => $value) {
            if ($key === "imagen") {
                echo "<td><img src='" . $value . "' alt='Imagen del producto' width='100'></td>";
            } else {
                echo "<td>" . $value . "</td>";
            }
        }
        echo "</tr>";
    
        echo "</table>";
    } else {
        echo "<p>No hay datos</p>";
    }

    ?>

</body>

</html>