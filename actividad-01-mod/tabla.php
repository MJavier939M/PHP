<?php


function obtenerDatosCSV($archivo)
{
    $datos = [];

    $openArchivo = fopen($archivo, "r");

    if ($openArchivo == true) {

        $cabeceras = fgetcsv($openArchivo); // Obtiene la primera fila del archivo (recordemos que fgetcsv() obtiene una sola fila del archivo)

        while (($fila = fgetcsv($openArchivo)) == true) { // Mientras haya filas en el archivo continua el bucle

            $datos[] = array_combine($cabeceras, $fila);
            
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

foreach ($pedidos as $pedido) { // Recorremos los pedidos (porque es la tabla principal / no relacionada con nada)
    foreach ($productos as $producto) { // Recorremos los productos (porque es la tabla que está relacionada con los pedidos)
        if ($pedido['id_producto'] == $producto['id_producto']) { // Si el id_producto del pedido es igual al id_producto del producto
            $productosAsociados[] = array_merge($pedido, $producto);
            break;
        }
    }
}

// Mostramos productos asociados en una tabla

if ($productosAsociados) { // Miramos si hay productos asociados
    echo "<table border='1'>";

    // Generar encabezados dinámicamente
    echo "<tr>";
    foreach ($productosAsociados[0] as $key => $value) { // Recorremos el primer elemento de $productosAsociados para obtener las cabeceras
        echo "<th>" . $key . "</th>"; // Solo usamos las keys de los elementos que son las cabeceras
    }
    echo "</tr>";

    // Generar filas de la tabla
    foreach ($productosAsociados as $productoAsociado) { // Recorremos los productos asociados
        echo "<tr>";
        foreach ($productoAsociado as $key => $value) { // Agregamos $key para identificar la clave
            if ($key === "imagen") { // Si la clave es "imagen"
                echo "<td><img src='" . $value . "' alt='Imagen del producto' width='100'></td>";
            } else {
                echo "<td>" . $value . "</td>"; // Mostramos el valor normal
            }
        }
        echo "</tr>"; // Cerramos la fila después de recorrer todos los valores
    }

    echo "</table>";
} else {
    echo "<p>No hay datos</p>";
}

//! TAREA 1:
//! Modifica el código para que muestre la imagen de los productos asociados en la tabla
//* acuerdate que para saber si uno de los datos es uma imagen puedes usar la key del bucle foreach
