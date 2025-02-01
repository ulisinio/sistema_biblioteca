<?php
$host = "localhost";
$user = "root";
$pass = "";
$bd = "biblioteca";

$conectar = mysqli_connect($host, $user, $pass, $bd);

if (!$conectar) {
    echo "No se pudo conectar a la base de datos";
}
?>