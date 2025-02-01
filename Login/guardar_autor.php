<?php

require "conexion.php"; // Incluye la conexión a la base de datos

// Obtener los datos del formulario
$nombre = addslashes($_POST['nombre']);
$nacionalidad = addslashes($_POST['nacionalidad']);

// Verificar si el autor ya existe (opcional, si no deseas duplicados)
$verificar_autor = mysqli_query($conectar, "SELECT * FROM autores WHERE nombre = '$nombre' AND nacionalidad = '$nacionalidad'");
if (mysqli_num_rows($verificar_autor) > 0) {
    echo '
    <script>
        alert("Este autor ya está registrado");
        location.href="autor.php";
    </script>
    ';
    exit;
}

// Insertar los datos en la tabla `autores`
$insertar = "INSERT INTO autores (nombre, nacionalidad) VALUES ('$nombre', '$nacionalidad')";

$query = mysqli_query($conectar, $insertar);

if ($query) {
    echo '
    <script>
        alert("Autor registrado correctamente");
        location.href="autor.php";
    </script>
    ';
} else {
    echo '
    <script>
        alert("No se pudo registrar el autor");
        location.href="autor.php";
    </script>
    ';
}

?>
