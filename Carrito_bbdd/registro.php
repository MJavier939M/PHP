<?php

session_start();
require_once "bbdd/config.php";

if (!empty($_POST["nombre"]) && !empty($_POST["contrasena"])) {
    
    $username = trim($_POST["nombre"]);
    $password = trim($_POST["contrasena"]);

    $password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, contrasena) VALUES (:nombre, :contrasena)");
    $stmt->bindParam(":nombre", $username);
    $stmt->bindParam(":contrasena", $password);

    if ($stmt->execute()) {
        header("location: index.php");
        exit;
    }else {
        echo "<p>Error al registrar el usuario</p>";
    }
}

include("template/registro.tpl.php");
?>

