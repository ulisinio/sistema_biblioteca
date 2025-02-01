<?php
require "conexion.php"; // Conexión a la base de datos

// Verificar que todos los datos necesarios llegaron desde el formulario
if (
    isset($_POST['id_libro'], $_POST['autor'], $_POST['anio'], 
          $_POST['editorial'], $_POST['carrera'])
) {
    // Capturar los datos del formulario
    $id_libro = $_POST['id_libro'];
    $autor = $_POST['autor']; // ID del autor
    $anio = $_POST['anio'];
    $editorial = $_POST['editorial'];
    $carrera = $_POST['carrera']; // ID de la carrera

    // Crear la consulta preparada para actualizar los datos del libro
    $consulta = "
        UPDATE libros
        SET autor = ?, anio = ?, editorial = ?, carrera = ?
        WHERE id_libro = ?";

    // Preparar la consulta y asociar parámetros
    $stmt = $conectar->prepare($consulta);
    $stmt->bind_param('iissi', $autor, $anio, $editorial, $carrera, $id_libro);

    // Ejecutar la consulta y verificar el resultado
    if ($stmt->execute()) {
        echo '<script>
            alert("Libro actualizado exitosamente.");
            location.href="libros.php";
        </script>';
    } else {
        echo '<script>
            alert("Error al actualizar el libro.");
            location.href="editar_libro.php?id=' . $id_libro . '";
        </script>';
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conectar->close();
} else {
    echo '<script>
        alert("Faltan datos en el formulario.");
        location.href="editar_libro.php?id=' . $_POST['id_libro'] . '";
    </script>';
}
?>
