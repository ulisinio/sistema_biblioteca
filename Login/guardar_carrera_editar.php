<?php
require "conexion.php"; // Conexión a la base de datos

// Recibir datos del formulario
if (isset($_POST['id_carrera']) && isset($_POST['nombre_carrera'])) {
    $id_carrera = $_POST['id_carrera'];
    $nombre_carrera = addslashes($_POST['nombre_carrera']); // Escapar caracteres especiales

    // Consulta para actualizar los datos de la carrera
    $actualizar = "UPDATE carreras SET nombre_carrera = '$nombre_carrera' WHERE id_carrera = '$id_carrera'";

    $query = mysqli_query($conectar, $actualizar);

    // Comprobar si la consulta fue exitosa
    if ($query) {
        echo '
        <script>
            alert("Se guardaron correctamente los datos.");
            location.href = "carreras.php"; // Redirigir a la lista de carreras
        </script>
        ';
    } else {
        echo '
        <script>
            alert("No se guardaron los datos.");
            location.href = "editar_carrera.php?id_carrera=' . $id_carrera . '"; // Regresar a la página de edición
        </script>
        ';
    }
} else {
    echo '
    <script>
        alert("Datos no válidos.");
        location.href = "carreras.php"; // Redirigir a la lista de carreras
    </script>
    ';
}
?>
