<?php 
include "seguridad.php"; // Asegúrate de que este archivo protege el acceso
include "conexion.php"; // Conexión a la base de datos

// Verificar si se ha pasado el id_carrera
if (isset($_GET['id_carrera'])) {
    $id_carrera = $_GET['id_carrera'];

    // Consultar los datos de la carrera
    $query = "SELECT * FROM carreras WHERE id_carrera = '$id_carrera'";
    $resultado = mysqli_query($conectar, $query);
    $fila = mysqli_fetch_assoc($resultado);

    // Verificar si se encontró la carrera
    if (!$fila) {
        echo '<script>alert("Carrera no encontrada."); location.href="carreras.php";</script>';
        exit;
    }
} else {
    echo '<script>alert("ID de carrera no proporcionado."); location.href="carreras.php";</script>';
    exit;
}

// Recuperar el nombre de usuario
$usuario = $_SESSION['adminpanel_username']; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Carrera</title>
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
                <h1>EDITAR CARRERA</h1>
                <br><br>
                <a href="carreras.php" class="btn-volver">Regresar</a>
                <br><br><br>

                <!-- Formulario para Editar Carrera -->
                <form action="guardar_carrera_editar.php" method="post">
                    <input type="hidden" name="id_carrera" value="<?php echo $fila['id_carrera']; ?>">
                    <div class="form-group">
                        <input name="nombre_carrera" type="text" id="nombre_carrera" class="form-control" value="<?php echo htmlspecialchars($fila['nombre_carrera']); ?>" placeholder="Nombre de la Carrera" required>
                    </div>
                    <button type="submit" class="btn btn-secondary">Guardar Cambios</button>
                </form>
            </div>
        </section>
    </div>
</body>
</html>

