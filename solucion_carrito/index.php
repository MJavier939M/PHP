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

//¿Hay productos añadidos al carrito? Si los hay, los meto en el carrito
getProductosAnadidos($carritoData);
$numeroProductos = getNumeroProductosCarrito($carritoData);

$productosMarkup = getProductosMarkup($productosData);

setCarritoDataInSession($carritoData);

include('./includes/productos.tpl.php');

?>