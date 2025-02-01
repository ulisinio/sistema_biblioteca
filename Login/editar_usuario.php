
<?php 
    include "seguridad.php";
    $usuario = $_SESSION['adminpanel_username'];
    $id_usuario = $_GET['id'];
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
            <h1>EDITAR USUARIO</h1>
            <?php
                require "conexion.php";
                $ver_usuario = "SELECT * FROM usuarios WHERE id='$id_usuario'";
                $resultado = mysqli_query($conectar, $ver_usuario);
                $fila = $resultado->fetch_array();
                ?>
            <br><br>
                <a href="usuarios.php" class="btn-volver">Regresar</a>
                <br><br><br>
                <form action="guardar_usuarios_editar.php" method="post">
            <div class="form-group">
                <input name="nombres" type="text" value="<?php echo $fila["nombres"]; ?>"id="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <input name="apellidos" type="text" value="<?php echo $fila["apellidos"]; ?>" id="apellidos" class="form-control">
            </div>
            <div class="form-group">
                <input type="email"value="<?php echo $fila["correo"]; ?>" id="email" class="form-control" disabled>
            </div>
            <div class="form-group">
                <input maxlength="10" name="contrasena" type="password" value="<?php echo $fila["contrasena"]; ?>" id="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                <input name="fechanacimiento" type="date" value="<?php echo $fila["fechanacimiento"]; ?>" id="fecha_nacimiento" class="form-control">
            </div>
            <!-- Ocultar cosas -->
            <input type="hidden" value="<?php echo $fila["id"]; ?>" name="id">
            <input type="hidden" value="<?php echo $fila["correo"]; ?>" name="correo">

            <button type="submit" class="btn btn-secondary">Editar</button>
        </form>
            </div>
        </section>
    </div>
</body>
</html>