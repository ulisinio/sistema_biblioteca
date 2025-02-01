
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
            <h1>VER USUARIO</h1>
            <br><br>
                <a href="usuarios.php" class="btn-volver">Regresar</a>
                <br><br>
                <div class="user-info2">
                    <?php
                    require "conexion.php";
                    $id_usuario = $_GET['id'];

                    $verusuario = "SELECT * FROM usuarios WHERE id = '$id_usuario'";
                    $resultado = mysqli_query($conectar, $verusuario);

                    $fila = $resultado->fetch_array();
                    ?>
        <div class="user-section">
        <span class="label">Nombre completo:</span> <br> <span class="value"><?php echo $fila["nombres"] . " " . $fila["apellidos"]; ?></span>
            <hr>
        </div>
        <div class="user-section">
            <span class="label">Contraseña:</span> <br> <span class="value"><?php echo $fila["contrasena"]; ?></span>
            <hr>
        </div>
        <div class="user-section">
            <span class="label">Correo:</span> <br> <span class="value"><?php echo $fila["correo"]; ?></span>
            <hr>
        </div>
        <div class="user-section">
            <span class="label">Fecha de Nacimiento:</span> <br> <span class="value"><?php echo $fila["fechanacimiento"]; ?></span>
            <hr>
        </div>
        <a href="editar_usuario.php?id=<?php echo $fila['id']; ?>"><button type="submit" class="btn btn-secondary">Editar</button></a>
    </div>
            </div>
        </section>
    </div>
</body>
</html>