<?php 
include "seguridad.php"; 
$usuario = $_SESSION['adminpanel_username']; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo - Crear Carrera</title>
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
                <h1>CREAR CARRERA</h1>
                <br><br>
                <a href="carreras.php" class="btn-volver">Regresar</a>
                <br><br><br>

                <!-- Formulario para Crear Carrera -->
                <form action="guardar_carrera.php" method="post">
                    <div class="form-group">
                        <input name="nombre_carrera" type="text" id="nombre_carrera" class="form-control" placeholder="Nombre de la Carrera" required>
                    </div>
                    <button type="submit" class="btn btn-secondary">Registrar Carrera</button>
                </form>
            </div>
        </section>
    </div>
</body>
</html>
