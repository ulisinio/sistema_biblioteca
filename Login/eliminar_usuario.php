<?php
require "conexion.php";
$id_usuario = $_GET['id'];

$eliminar = "DELETE FROM usuarios WHERE id='$id_usuario'";

$resultado = mysqli_query($conectar, $eliminar);

if ($resultado) {
    header ("location:usuarios.php");
} else {
    echo "No se puede eliminar el dato";
}
?>