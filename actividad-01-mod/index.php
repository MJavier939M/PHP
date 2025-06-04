<?php


?><!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 1</title>
    <link rel="stylesheet" href="https://unpkg.com/simpledotcss/simple.min.css">

</head>

<body>
    <?php require 'tabla.php'; ?>

    <br>
    <hr>
    <br>

    <!-- 
    //! TAREA 2:
    //! Crea un formulario que contenga dos botones, uno para borrar los registros de los CSVs y otro para rellenar los CSVs con registros.
    //* Hacer que los botones envíen una petición POST a botones.php
    //* En botones.php, si se recibe la petición de borrar los registros, llamar a la función que borra los registros de los CSVs
    //* En botones.php, si se recibe la petición de rellenar los registros, llamar a la función que rellena los registros de los CSVs
    //* Después de llamar a la función correspondiente, redirigir al usuario a index.php 
    -->

    <form action="botones.php" method="post">
        <button type="submit"  name="borrar">Borrar Registros</button>
        <button type="submit"  name="rellenar">Rellenar Registros</button>
    </form>


    <br>
    <hr>
    <br>

    <button><a href="aleatorio.php">Ir a pagina Aleatorio</a></button>

    

</body>

</html>