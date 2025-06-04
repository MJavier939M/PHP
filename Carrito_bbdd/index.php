<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

Include("app/functions.php");

require_once "bbdd/config.php";

if (isset($_POST["nombre"]) && isset($_POST["contrasena"]) && !empty($_POST["nombre"]) && !empty($_POST["contrasena"])) {
    $username = $_POST["nombre"];
    $password = $_POST["contrasena"];

    $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE nombre = :nombre");
    $stmt->bindParam(":nombre", $username);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($password, trim($usuario["contrasena"]))) {
        $_SESSION["nombre"] = $usuario["nombre"];
        header("location: productos.php");
        exit;
    } else {
        $mensaje = "<p>Usuario o contraseña incorrecto</p>";
    }
}

include("template/index.tpl.php");
?>
