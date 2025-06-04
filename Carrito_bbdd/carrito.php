<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once "bbdd/config.php";

if (isset($_POST["cantidad"])) {
    $id = $_POST["id"];
    $cantidad = $_POST["cantidad"];

    if (isset($_SESSION["carrito"][$id])) {
        if ($cantidad == 0) {
            unset($_SESSION["carrito"][$id]);
        }else {
            $_SESSION["carrito"][$id] = $cantidad;
        }
    }
}





include ("template/carrito.tpl.php");
?>