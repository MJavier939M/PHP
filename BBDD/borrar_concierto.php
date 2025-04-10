<?php

require_once 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM conciertos WHERE id = $id";

    if ($conexion -> query($sql) === true) {
        header("location: conciertos.php");
    }

}

?>