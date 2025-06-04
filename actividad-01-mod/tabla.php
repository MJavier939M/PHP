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
    <tbody>';
    
    foreach ($productosAsociados as $productoAsociado) {
        $table .= '<tr>
            <td>'.$productoAsociado['id_pedido'].'</td>
            <td>'.$productoAsociado['id_producto'].'</td>
            <td>'.$productoAsociado['cliente'].'</td>
            <td>'.$productoAsociado['cantidad'].'</td>
            <td>'.$productoAsociado['fecha'].'</td>
            <td>'.$productoAsociado['nombre'].'</td>
            <td>'.$productoAsociado['categoria'].'</td>
            <td>'.$productoAsociado['precio'].'</td>
            <td>'.$productoAsociado['stock'].'</td>
            <td><img src="'.$productoAsociado['imagen'].'" width="100px" height="100px"></td>
        </tr>';
    }
    $table .= '</tbody> </table>';

    echo $table;

} else {
    echo "<p>No hay datos</p>";
}

//! TAREA 1:
//! Modifica el código para que muestre la imagen de los productos asociados en la tabla
//* acuerdate que para saber si uno de los datos es uma imagen puedes usar la key del bucle foreach
