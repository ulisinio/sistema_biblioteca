<?php
require "conexion.php"; // Asegúrate de que este archivo contiene la conexión a la base de datos

// Obtener el nombre de la carrera del formulario
$nombre_carrera = addslashes($_POST['nombre_carrera']);

// Consulta para insertar la nueva carrera en la base de datos
$insertar = "INSERT INTO carreras (nombre_carrera) VALUES ('$nombre_carrera')";

$query = mysqli_query($conectar, $insertar);

// Verificar si la inserción fue exitosa
if ($query) {
    echo '
    <script>
    alert("La carrera se ha registrado correctamente");
    location.href="carreras.php"; // Redirigir a la página de carreras
    </script>
    ';
} else {
    echo '
    <script>
    alert("Error al registrar la carrera");
    location.href="crear_carrera.php"; // Regresar al formulario de creación
    </script>
    ';
}
?>
