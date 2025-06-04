<?php

include("./resources/includes/bootstrap.php");//Este archivo no debe ser modificado.
include("./resources/includes/functions.inc.php");

// Cargamos los datos de configuración de la base de datos.
//TO DO: Si lo consideras adecuado, puedes llevar este bloque try - catch a la función que consideres en functions.inc.php
try {
    $dbConfig = getDatabaseConfigFromEnv(__DIR__ . '/.env');
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}

//TO DO Aquí la lógica de la aplicación

session_start();

$_SESSION['mensaje'] = "";

if (!isset($_SESSION['coordenadas'])) {
    $_SESSION['coordenadas'] = [];
}

if (isset($_POST['marcar'])) {
    marcar();    
}else if (isset($_POST['guardar'])) {
    guardarBD();
}else if (isset($_POST['limpiar'])) {
    limpiar();
}


include("./resources/templates/index.tpl.php");
?>
