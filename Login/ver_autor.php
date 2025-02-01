<?php 
include "seguridad.php"; 
$usuario = $_SESSION['adminpanel_username'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo - Ver Autor</title>
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
                <h1>VER AUTOR</h1>
                <br><br>
                <a href="autor.php" class="btn-volver">Regresar</a>
                <br><br>
                <div class="user-info2">
                    <?php
                    require "conexion.php";
                    $id_autor = $_GET['id_autor'];

                    $verautor = "SELECT * FROM autores WHERE id_autor = '$id_autor'";
                    $resultado = mysqli_query($conectar, $verautor);

                    // Verificamos si se obtuvo un resultado
                    if ($resultado && mysqli_num_rows($resultado) > 0) {
                        $fila = mysqli_fetch_assoc($resultado);
                    ?>
                        <div class="user-section">
                            <span class="label">Nombre completo:</span> <br> 
                            <span class="value"><?php echo htmlspecialchars($fila["nombre"]); ?></span>
                            <hr>
                        </div>
                        <div class="user-section">
                            <span class="label">Nacionalidad:</span> <br> 
                            <span class="value"><?php echo htmlspecialchars($fila["nacionalidad"]); ?></span>
                            <hr>
                        </div>
                        <a href="editar_autor.php?id_autor=<?php echo $fila['id_autor']; ?>"><button type="submit" class="btn btn-secondary">Editar</button></a>
                    <?php
                    } else {
                        echo "<p>No se encontró el autor.</p>";
                    }
                    ?>
                </div>
            </div>
        </section>
    </div>
</body>
</html>

