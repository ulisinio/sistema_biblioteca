<?php
require "conexion.php"; // Asegúrate de que este archivo contiene la conexión a la base de datos

// Verificar si se ha pasado el id_carrera
if (isset($_GET['id_carrera'])) {
    $id_carrera = $_GET['id_carrera'];

    // Consulta para eliminar la carrera de la base de datos
    $eliminar = "DELETE FROM carreras WHERE id_carrera = '$id_carrera'";

    $query = mysqli_query($conectar, $eliminar);

    // Verificar si la eliminación fue exitosa
    if ($query) {
        echo '
        <script>
        location.href="carreras.php"; // Redirigir a la página de carreras
        </script>
        ';
    } else {
        echo '
        <script>
        alert("Error al eliminar la carrera");
        location.href="carreras.php"; // Regresar a la página de carreras
        </script>
        ';
    }
} else {
    // Si no se proporciona el id_carrera
    echo '
    <script>
    alert("ID de carrera no proporcionado");
    location.href="carreras.php"; // Regresar a la página de carreras
    </script>
    ';
}
?>
