<?php

if (isset($_POST['operacion'])) {
    if ($_POST['operacion'] == "eliminar") {
        eliminar();
    } else if ($_POST['operacion'] == "editar") {
        editar();
    } else {
        editarRegistro();
    }
}

if (isset($_POST['añadir'])) {
    añadir();
}
function eliminar() {
    if (!isset($_POST['registro']) || empty($_POST['registro'])) {
        header("Location: index.php");
        exit;
    }

    $datos = $_POST['registro'];
    $datosCSV = [];
    $openArchivo = fopen("usuarios.csv", "r");

    if ($openArchivo) {
        $cabeceras = fgetcsv($openArchivo);
        while (($fila = fgetcsv($openArchivo)) !== false) {
            $datosCSV[] = array_combine($cabeceras, $fila);
        }
        fclose($openArchivo);
    }
    foreach ($datos as $dato) {
        foreach ($datosCSV as $key => $datoCSV) {
            if ($datoCSV['id_usuario'] == $dato) {
                unset($datosCSV[$key]);
            }
        }
    }
    $openArchivo = fopen("usuarios.csv", "w");
    fputcsv($openArchivo, $cabeceras);
    foreach ($datosCSV as $dato) {
        fputcsv($openArchivo, $dato);
    }
    fclose($openArchivo);
    header("Location: index.php");
}

function editar() {
    header("Location: formulario.php?id_usuario={$_POST['registro'][0]}");
}

function editarRegistro() {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $curso = $_POST['curso'];
    $id = $_POST['id_usuario'];
    $datosCSV = [];
    $openArchivo = fopen("usuarios.csv", "r");

    if ($openArchivo) {
        $cabeceras = fgetcsv($openArchivo);
        while (($fila = fgetcsv($openArchivo)) !== false) {
            $datosCSV[] = array_combine($cabeceras, $fila);
        }
        fclose($openArchivo);
    }

    foreach ($datosCSV as &$dato) {
        if ($dato['id_usuario'] == $id) {
            $dato['nombre'] = $nombre;
            $dato['edad'] = $edad;
            $dato['curso'] = $curso;
        }
    }
    unset($dato);

    $openArchivo = fopen("usuarios.csv", "w");
    fputcsv($openArchivo, $cabeceras);
    foreach ($datosCSV as $dato) {
        fputcsv($openArchivo, $dato);
    }
    fclose($openArchivo);
    header("Location: index.php");
}

function añadir() {
    if (!isset($_POST['nombre']) || !isset($_POST['edad']) || !isset($_POST['curso'])) {
        header("Location: index.php");
        exit;
    }

    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $curso = $_POST['curso'];

    // Leer el archivo CSV para obtener el último ID
    $datosCSV = [];
    $openArchivo = fopen("usuarios.csv", "r");

    if ($openArchivo) {
        $cabeceras = fgetcsv($openArchivo);
        while (($fila = fgetcsv($openArchivo)) !== false) {
            $datosCSV[] = array_combine($cabeceras, $fila);
        }
        fclose($openArchivo);
    }

    // Generar un nuevo ID basado en el último ID existente
    $nuevoId = count($datosCSV) > 0 ? end($datosCSV)['id_usuario'] + 1 : 1;

    $nuevoRegistro = [$nuevoId,$nombre,$edad,$curso];

    // Añadir el nuevo registro al archivo CSV
    $openArchivo = fopen("usuarios.csv", "a");
    fputcsv($openArchivo, $nuevoRegistro);
    fclose($openArchivo);

    header("Location: index.php");
}

?>