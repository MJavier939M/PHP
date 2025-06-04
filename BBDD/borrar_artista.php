<?php

require_once 'conexion.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $conn -> beginTransaction();
    try {
        $sql = "DELETE FROM conciertos WHERE id_artista = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam("id",$id,PDO::PARAM_INT);
        $stmt->execute();
        
        $sql = "DELETE FROM artistas WHERE id = :id";
        $stmt2 = $conn->prepare($sql);
        $stmt2->bindParam("id",$id,PDO::PARAM_INT);
        $stmt2->execute();
        $conn -> commit();
        
        header("location: artistas.php");

    } catch (\Throwable $th) {
        $conn -> rollBack();
    }
}

?>