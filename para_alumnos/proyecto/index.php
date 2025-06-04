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

$movies = getMovies($dbConfig);
$itemsSliderMarkup = getMoviesMarkup($movies);

include("./resources/templates/index.tpl.php");
?>
