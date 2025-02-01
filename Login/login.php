<?php
session_start();

// Verificar si el usuario ya está autenticado para este panel
if (isset($_SESSION['adminpanel_autentificado']) && $_SESSION['adminpanel_autentificado'] == "SI") {
    header("Location: principal.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Login</title>
</head>
<body>
    <div class="contenedor_logo">
        <a href="consumir_datos.php">
            <img src="biblio.jpg" alt="Logo_Biblioteca">
        </a>
    </div>
    <div class="contenedor_formulario">
        <form action="autentificar.php" method="post">
            <h2>Login</h2>
            <?php
            $errorusuario = isset($_GET["errorusuario"]) && $_GET["errorusuario"] == "SI";
            if ($errorusuario) {
                echo '<h3 class="avisoerror">Datos incorrectos</h3><br>';
            }
            ?>
            <div class="form-group">
                <input type="text" name="correo" id="correo" class="form-control" placeholder="Introduce tu correo" required>
            </div>
            <div class="form-group">
                <input type="password" name="contrasena" id="contrasena" class="form-control" placeholder="Contraseña" required>
            </div>
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
            <!-- <hr>
            <a href="nueva_cuenta.php" class="btn2 btn-secondary">Crear cuenta nueva</a> -->
        </form>
    </div>
    <div class="footer">
        <p>© 2024 <span class="rojito">ULISES MILLÁN</span>. Todos los derechos reservados</p>
    </div>
</body>
</html>
