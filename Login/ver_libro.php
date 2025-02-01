<?php 
include "seguridad.php"; 
$usuario = $_SESSION['adminpanel_username'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo - Ver Libro</title>
    <link rel="stylesheet" href="styles_admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body>
    <div class="container">
        <!-- Menú Lateral Izquierdo -->
        <?php include "menu.php"; ?>

        <!-- Contenido del Panel -->
        <section class="main-content">
            <div class="header">
                <a href="salir.php" class="btn-logout">Cerrar Sesión</a>
            </div>
            <div class="content">
                <h1>VER LIBRO</h1>
                <br><br>
                <a href="libros.php" class="btn-volver">Regresar</a>
                <br><br>
                <div class="user-info2">
                    <?php
                    require "conexion.php";
                    $id_libro = $_GET['id'];

                    $verlibro = "
                        SELECT libros.titulo, autores.nombre AS autor, libros.anio, 
                               libros.editorial, carreras.nombre_carrera 
                        FROM libros 
                        JOIN autores ON libros.autor = autores.id_autor 
                        JOIN carreras ON libros.carrera = carreras.id_carrera 
                        WHERE libros.id_libro = '$id_libro'";

                    $resultado = mysqli_query($conectar, $verlibro);

                    // Verificamos si se obtuvo un resultado
                    if ($resultado && mysqli_num_rows($resultado) > 0) {
                        $fila = mysqli_fetch_assoc($resultado);
                    ?>
                        <div class="user-section">
                            <span class="label">Título:</span> <br>
                            <span class="value"><?php echo htmlspecialchars($fila["titulo"]); ?></span>
                            <hr>
                        </div>
                        <div class="user-section">
                            <span class="label">Autor:</span> <br>
                            <span class="value"><?php echo htmlspecialchars($fila["autor"]); ?></span>
                            <hr>
                        </div>
                        <div class="user-section">
                            <span class="label">Año:</span> <br>
                            <span class="value"><?php echo htmlspecialchars($fila["anio"]); ?></span>
                            <hr>
                        </div>
                        <div class="user-section">
                            <span class="label">Editorial:</span> <br>
                            <span class="value"><?php echo htmlspecialchars($fila["editorial"]); ?></span>
                            <hr>
                        </div>
                        <div class="user-section">
                            <span class="label">Carrera:</span> <br>
                            <span class="value"><?php echo htmlspecialchars($fila["nombre_carrera"]); ?></span>
                            <hr>
                        </div>
                        <a href="editar_libro.php?id=<?php echo $id_libro; ?>">
                            <button type="submit" class="btn btn-secondary">Editar</button>
                        </a>
                    <?php
                    } else {
                        echo "<p>No se encontró el libro.</p>";
                    }
                    ?>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
