<?php

session_start();

if (isset($_POST["musculos"])) {
    $_SESSION["musculos"] = $_POST["musculos"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="paso4.php">
        <select name="mejoras">
            <?php if ($_SESSION["musculos"] == "biceps") {
                echo "<option value='Flexión con cable'>Flexión con cable</option>";
                echo "<option value='Planchas'>Planchas</option>";
            }else if ($_SESSION["musculos"] == "triceps") {
                echo "<option value='Press Banca'>Press Banca</option>";
                echo "<option value='Barras paralelas'>Barras paralelas</option>";
            }{
                echo "<option value='Sentadillas'>Sentadillas</option>";
                echo "<option value='Zancadas'>Zancadas</option>";
            }?>
        </select>
        <button type="submit">ENVIAR</button>
        <a href="paso2.php">Volver</a>
    </form>
</body>
</html>