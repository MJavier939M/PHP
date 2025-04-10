<?php

require_once 'conexion.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $conexion -> begin_transaction();
    try {
        $sql = "DELETE FROM conciertos WHERE id_artista = $id";
        $conexion -> query($sql);
        $sql = "DELETE FROM artistas WHERE id = $id";
        $conexion -> query($sql);
        $conexion -> commit();
        
        header("location: artistas.php");

    } catch (\Throwable $th) {
        $conexion -> rollback();
    }
}

?>