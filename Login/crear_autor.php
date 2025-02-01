<?php 
    include "seguridad.php";
    $usuario = $_SESSION['adminpanel_username'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo</title>
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
                <h1>CREAR AUTOR</h1>
                <br><br>
                <a href="autor.php" class="btn-volver">Regresar</a>
                <br><br><br>

                <!-- Formulario para Crear Autor -->
                <form action="guardar_autor.php" method="post">
                    <div class="form-group">
                        <input name="nombre" type="text" id="nombre" class="form-control" placeholder="Nombre" required>
                    </div>
                    <div class="form-group">
                        <input name="nacionalidad" type="text" id="nacionalidad" class="form-control" placeholder="Nacionalidad" required>
                    </div>
                    <button type="submit" class="btn btn-secondary">Registrar Autor</button>
                </form>
            </div>
        </section>
    </div>
</body>
</html>
