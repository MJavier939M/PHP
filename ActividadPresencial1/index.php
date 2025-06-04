<?php
include('vars.php');

if (isset($_POST['letras']) && !empty($_POST['letras'])) {

    $letrasSeleccionadas = $_POST['letras'];

    $videojuegosFiltrados = array();

    foreach ($videojuegos as $videojuego) {
        $primeraLetra = strtoupper(substr($videojuego['nombre'], 0, 1));
        if (in_array($primeraLetra, $letrasSeleccionadas)) {
            $videojuegosFiltrados[] = $videojuego;
        }
    }
} else {
    $letrasSeleccionadas = array();
    $videojuegosFiltrados = $videojuegos;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Videojuegos</title>
</head>
<body>
    <h1>Videojuegos por inicial</h1>
    <h2>Elige las letras para filtrar:</h2>
    <form method="POST">
        <?php
        
        $letras = range('A', 'Z');
        foreach ($letras as $letra) {
            $checked = in_array($letra, $letrasSeleccionadas) ? 'checked' : '';
            echo "<label>
                <input type='checkbox' name='letras[]' value='$letra' $checked> $letra
                </label> ";
        }
        ?>
        <br><br>
        <input type="submit" value="Filtrar">
    </form>
    <a href="index.php">Reiniciar</a>

    <h2>Resultados:</h2>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Fecha de lanzamiento</th>
            <th>Creador</th>
        </tr>
        <?php foreach ($videojuegosFiltrados as $videojuego): ?>
        <tr>
            <td><?php echo $videojuego['nombre']; ?></td>
            <td><?php echo isset($videojuego['fecha']) ? $videojuego['fecha'] : $videojuego['anio']; ?></td>
            <td><?php echo isset($videojuego['creador']) ? $videojuego['creador'] : 'NULL'; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
