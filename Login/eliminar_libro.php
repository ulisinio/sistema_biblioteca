<?php
require "conexion.php";

// Obtener el ID del libro desde la URL
$id_libro = $_GET['id'];

// Consulta para eliminar el libro
$eliminar = "DELETE FROM libros WHERE id_libro = '$id_libro'";

// Ejecutar la consulta
$resultado = mysqli_query($conectar, $eliminar);

// Redirigir o mostrar mensaje según el resultado
if ($resultado) {
    header("Location: libros.php");
} else {
    echo "No se puede eliminar el libro.";
}
?>
