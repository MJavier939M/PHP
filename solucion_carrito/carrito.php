<?php

//Show all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Inicializamos la sesión
session_start();

//Incluimos las funciones
include('./includes/functions.inc.php');



$productosData = getProductosData();
$carritoData = getCarritoData();

//TO DO Procesar los datos del formulario
setCarritoDataFromForm($carritoData);

$numeroProductos = getNumeroProductosCarrito($carritoData);

$carritoMarkup = getCarritoMarkup($carritoData, $productosData);

setCarritoDataInSession($carritoData);

include('./includes/carrito.tpl.php');

?>