<?php

require "conexion.php"; // Asegúrate de incluir la conexión a la base de datos

// Captura los datos del formulario usando POST
$id_autor = $_POST['id_autor'];
$nombre = addslashes($_POST['nombre']);
$nacionalidad = addslashes($_POST['nacionalidad']);

// Preparar la consulta para actualizar los datos del autor
$actualizar = "UPDATE autores SET nombre='$nombre', nacionalidad='$nacionalidad' WHERE id_autor='$id_autor'";

// Ejecutar la consulta
$query = mysqli_query($conectar, $actualizar);

// Comprobar si la consulta se ejecutó correctamente
if ($query) {
    echo '
    <script>
    alert("Se guardaron correctamente los datos del autor");
    location.href="ver_autor.php?id_autor=' . $id_autor . '"; // Redirigir a la página de ver autor
    </script>
    ';
} else {
    echo '
    <script>
    alert("No se guardaron los datos del autor");
    location.href="autor.php"; // Redirigir a la página de listado de autores
    </script>
    ';
}
?>
