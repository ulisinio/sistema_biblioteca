<?php
require "conexion.php";

// Obtener el ID del autor desde la URL
$id_autor = $_GET['id_autor'];

// Verificar que el ID no esté vacío y sea numérico
if (!empty($id_autor) && is_numeric($id_autor)) {
    // Query para eliminar el autor por ID
    $eliminar = "DELETE FROM autores WHERE id_autor = '$id_autor'";

    // Ejecutar la consulta
    $resultado = mysqli_query($conectar, $eliminar);

    // Verificar si la eliminación fue exitosa
    if ($resultado) {
        // Redirigir a la lista de autores
        header("Location: autor.php");
    } else {
        echo "No se puede eliminar el autor.";
    }
} else {
    echo "ID de autor no válido.";
}
?>
