<?php 
include "seguridad.php";
$usuario = $_SESSION['adminpanel_username'];

// Conectar a la base de datos
include "conexion.php"; // Asegúrate de que este archivo contiene la conexión a la base de datos

// Consultar los autores
$query_autores = "SELECT id_autor, nombre FROM autores"; // Cambia 'nombre' si el campo es diferente
$result_autores = mysqli_query($conectar, $query_autores);
if (!$result_autores) {
    die("Error en la consulta de autores: " . mysqli_error($conectar));
}

// Consultar las carreras
$query_carreras = "SELECT id_carrera, nombre_carrera FROM carreras";
$result_carreras = mysqli_query($conectar, $query_carreras);
if (!$result_carreras) {
    die("Error en la consulta de carreras: " . mysqli_error($conectar));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Libro</title>
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
                <h1>CREAR LIBRO</h1>
                <br><br>
                <a href="libros.php" class="btn-volver">Regresar</a>
                <br><br><br>

                <!-- Formulario para Crear Libro -->
                <form action="guardar_libro.php" method="post">
                    <div class="form-group">
                        <label for="titulo">Titulo:</label>
                        <input name="titulo" type="text" id="titulo" class="form-control" placeholder="Título" required>
                    </div>
                    <div class="form-group">
                        <label for="autor">Autor:</label>
                        <select name="autor" id="autor" class="form-control" required>
                            <option value="">Seleccione un autor</option>
                            <?php while ($fila = mysqli_fetch_assoc($result_autores)): ?>
                                <option value="<?php echo $fila['id_autor']; ?>">
                                    <?php echo htmlspecialchars($fila['nombre']); ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group"> 
                        <label for="anio">Año:</label>
                        <input name="anio" type="number" id="anio" class="form-control" placeholder="Año" required>
                    </div>
                    <div class="form-group">
                        <label for="editorial">Editorial:</label>
                        <input name="editorial" type="text" id="editorial" class="form-control" placeholder="Editorial" required>
                    </div>
                    <div class="form-group">
                        <label for="carrera">Carrera:</label>
                        <select name="carrera" id="carrera" class="form-control" required>
                            <option value="">Seleccione una carrera</option>
                            <?php while ($fila = mysqli_fetch_assoc($result_carreras)): ?>
                                <option value="<?php echo $fila['id_carrera']; ?>">
                                    <?php echo htmlspecialchars($fila['nombre_carrera']); ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-secondary">Registrar Libro</button>
                </form>
            </div>
        </section>
    </div>
</body>
</html>
