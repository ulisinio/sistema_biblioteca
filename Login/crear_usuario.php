
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
            <h1>CREAR USUARIO</h1>
            <br><br>
                <a href="usuarios.php" class="btn-volver">Regresar</a>
                <br><br><br>
                <form action="guardar_usuarios2.php" method="post">
            <div class="form-group">
                <input name="nombres" type="text" id="nombre" class="form-control" placeholder="Nombre(s)" required>
            </div>
            <div class="form-group">
                <input name="apellidos" type="text" id="apellidos" class="form-control" placeholder="Apellidos">
            </div>
            <div class="form-group">
                <input name="correo" type="email" id="email" class="form-control" placeholder="Correo Electronico" required>
            </div>
            <div class="form-group">
                <input maxlength="10" name="contrasena" type="password" id="password" class="form-control" placeholder="Contraseña" required>
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                <input name="fechanacimiento" type="date" id="fecha_nacimiento" class="form-control">
            </div>
            <button type="submit" class="btn btn-secondary">Registrar</button>
        </form>
            </div>
        </section>
    </div>
</body>
</html>