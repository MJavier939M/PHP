<?php

function getTable($datos) {
    
    $output = '<table border="1">
    <thead>
        <th>Origen</th>
        <th>Destino</th>
        <th>Precio</th>
        <th>Fecha de vuelo</th>
        <th>Aerolinea</th>
        <th>Seleccionar</th>
    </thead>    
    <tbody>';

    foreach ($datos as $dato) {

       $output .=  '<tr>
          <td>'.$dato['Origen'].'<input type="hidden" name="origen['.$dato['ID'].']" value="'.$dato['Origen'].'"></td>
          <td>'.$dato['Destino'].'<input type="hidden" name="destino['.$dato['ID'].']" value="'.$dato['Destino'].'"></td>
          <td>'.$dato['Precio'].'<input type="hidden" name="precio['.$dato['ID'].']" value="'.$dato['Precio'].'"></td>
          <td>'.$dato['Fecha de Vuelo'].'<input type="hidden" name="fecha_vuelo['.$dato['ID'].']" value="'.$dato['Fecha de Vuelo'].'"></td>
          <td>'.$dato['Aerolínea'].'<input type="hidden" name="aerolinea['.$dato['ID'].']" value="'.$dato['Aerolínea'].'"></td>
          <td><input name="vuelo[]" value="'.$dato['ID'].'" type="checkbox"/></td>
        </tr>';
    
    }
    $output .= '</tbody>'; 
    $output .= '</table>';
    return $output;
}

function filtrar($datos) {
    
    if (isset($_POST['destino']) && !empty($_POST['destino']) || isset($_POST['fecha']) && !empty($_POST['fecha'])) {
        $destino = quitarTildes($_POST['destino']);
        $fecha = $_POST['fecha'];
    
        $datosFiltrados = [];

        foreach ($datos as $dato) {
            if (quitarTildes($dato['Destino']) == $destino || $dato['Fecha de Vuelo'] == $fecha) {
                $datosFiltrados[] = $dato;
            }
        }

        return $datosFiltrados;
    }
    return $datos;
}

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

function quitarTildes($str) {
    $vocalesTildes = ["á","é","í","ó","ú"];
    $vocalesSinTildes = ["a","e","i","o","u"];
    return strtolower(str_replace($vocalesTildes,$vocalesSinTildes,$str));
}

function dump($var) {
   echo '<pre>'.print_r($var,true).'</pre>';
}