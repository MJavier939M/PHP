<?php

require_once("functions.php");


$datosCSV = obtenerDatosCSV('vuelos.csv');
$datosFiltrados = filtrar($datosCSV);
$tabla = getTable($datosFiltrados);

include_once("./templates/index.tpl.php");
?>
