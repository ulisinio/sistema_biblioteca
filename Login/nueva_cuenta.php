<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <title>Crear Nueva Cuenta</title>
</head>
<body>
    <div class="contenedor_logo">
        <a href="login.php">
            <img src="LOGO-VERTICAL-TECNM.png" alt="Logo_Tecnm">
        </a>
    </div>
    <div class="contenedor_formulario">
        <h1>Regístrate</h1>
        <form action="guardar_usuarios.php" method="post">
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
    <div class="footer">
        <p>© 2024 <span class="rojito">ULISES MILLÁN</span>. Todos los derechos reservados</p>
    </div>
</body>
</html>
