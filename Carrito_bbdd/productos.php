<?php

require_once "bbdd/config.php";
session_start();

if (!isset($_SESSION["nombre"])) {
    header("location: index.php");
}

if (isset($_POST["cantidad"])) {
    $id = $_POST["id"];
    $cantidad = $_POST["cantidad"];

    if (isset($_SESSION["carrito"][$id])) {
        $_SESSION["carrito"][$id] += $cantidad;
    }else {
        $_SESSION["carrito"][$id] = $cantidad;
    }
    
}

include("template/productos.tpl.php");
?>