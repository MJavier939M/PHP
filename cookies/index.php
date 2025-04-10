<?php

$visitas = 0;

if (isset($_COOKIE["visitas"])) {
    $visitas = $_COOKIE["visitas"] + 1;    
}


setcookie("visitas",$visitas,time()+3600);

echo $visitas;


?>