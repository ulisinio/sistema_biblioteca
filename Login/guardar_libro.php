<?php
require "conexion.php"; // Conexión a la base de datos

// Capturar datos del formulario usando addslashes para evitar caracteres no deseados
$titulo = addslashes($_POST['titulo']);
$autor = (int)$_POST['autor']; // Convertir a entero para mayor seguridad
$anio = (int)$_POST['anio'];
$editorial = addslashes($_POST['editorial']);
$carrera = (int)$_POST['carrera'];

// Verificar si el libro ya existe (por título y año)
$verificar_libro = mysqli_query($conectar, "SELECT * FROM libros WHERE titulo = '$titulo' ");
if (mysqli_num_rows($verificar_libro) > 0) {
    echo '
    <script>
        alert("Este libro ya está registrado");
        location.href="crear_libro.php";
    </script>';
    exit;
}

// Insertar el libro en la base de datos
$insertar = "INSERT INTO libros (titulo, autor, anio, editorial, carrera) 
             VALUES ('$titulo', $autor, $anio, '$editorial', $carrera)";

$query = mysqli_query($conectar, $insertar);

if ($query) {
    echo '
    <script>
        alert("El libro se guardó correctamente");
        location.href="libros.php";
    </script>';
} else {
    echo '
    <script>
        alert("Error al guardar el libro");
        location.href="crear_libro.php";
    </script>';
}
?>