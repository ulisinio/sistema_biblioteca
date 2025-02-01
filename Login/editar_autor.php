<?php 
include "seguridad.php";
$usuario = $_SESSION['adminpanel_username'];
$id_autor = $_GET['id_autor']; // Cambié 'id' a 'id_autor' para que coincida con tu base de datos.
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo - Editar Autor</title>
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
                <h1>EDITAR AUTOR</h1>
                <?php
                require "conexion.php";
                $ver_autor = "SELECT * FROM autores WHERE id_autor='$id_autor'";
                $resultado = mysqli_query($conectar, $ver_autor);

                // Verificamos si se obtuvo un resultado
                if ($resultado && mysqli_num_rows($resultado) > 0) {
                    $fila = mysqli_fetch_assoc($resultado);
                ?>
                <br><br>
                <a href="autor.php" class="btn-volver">Regresar</a>
                <br><br><br>
                <form action="guardar_autor_editar.php" method="post">
                    <div class="form-group">
                        <input name="nombre" type="text" value="<?php echo htmlspecialchars($fila["nombre"]); ?>" id="nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input name="nacionalidad" type="text" value="<?php echo htmlspecialchars($fila["nacionalidad"]); ?>" id="nacionalidad" class="form-control" required>
                    </div>
                    <!-- Ocultar el ID del autor -->
                    <input type="hidden" value="<?php echo $fila["id_autor"]; ?>" name="id_autor">
                    <button type="submit" class="btn btn-secondary">Editar</button>
                </form>
                <?php
                } else {
                    echo "<p>No se encontró el autor.</p>";
                }
                ?>
            </div>
        </section>
    </div>
</body>
</html>
