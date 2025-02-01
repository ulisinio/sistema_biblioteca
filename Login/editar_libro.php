<?php 
include "seguridad.php";
$usuario = $_SESSION['adminpanel_username'];

// Conectar a la base de datos
include "conexion.php";

// Obtener el ID del libro a editar
$id_libro = $_GET['id'];

// Consultar los datos del libro seleccionado
$query_libro = "
    SELECT * FROM libros
    WHERE id_libro = '$id_libro'";
$result_libro = mysqli_query($conectar, $query_libro);

if (!$result_libro || mysqli_num_rows($result_libro) == 0) {
    die("Error: No se encontró el libro.");
}
$libro = mysqli_fetch_assoc($result_libro);

// Consultar los autores
$query_autores = "SELECT id_autor, nombre FROM autores";
$result_autores = mysqli_query($conectar, $query_autores);

// Consultar las carreras
$query_carreras = "SELECT id_carrera, nombre_carrera FROM carreras";
$result_carreras = mysqli_query($conectar, $query_carreras);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Libro</title>
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
                <h1>EDITAR LIBRO</h1>
                <br><br>
                <a href="libros.php" class="btn-volver">Regresar</a>
                <br><br><br>

                <!-- Formulario para Editar Libro -->
                <form action="guardar_editar_libro.php" method="post">
                    <input type="hidden" name="id_libro" value="<?php echo $libro['id_libro']; ?>">

                    <div class="form-group">
                        <label for="titulo">Título:</label>
                        <input name="titulo" type="text" id="titulo" class="form-control" 
                               value="<?php echo htmlspecialchars($libro['titulo']); ?>" required disabled>
                    </div>

                    <div class="form-group">
                        <label for="autor">Autor:</label>
                        <select name="autor" id="autor" class="form-control" required>
                            <option value="" disabled selected>Seleccione un autor</option>
                            <?php while ($autor = mysqli_fetch_assoc($result_autores)): ?>
                                <option value="<?php echo $autor['id_autor']; ?>" 
                                    <?php echo ($autor['id_autor'] == $libro['autor']) ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($autor['nombre']); ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="form-group"> 
                        <label for="anio">Año:</label>
                        <input name="anio" type="number" id="anio" class="form-control" 
                               value="<?php echo htmlspecialchars($libro['anio']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="editorial">Editorial:</label>
                        <input name="editorial" type="text" id="editorial" class="form-control" 
                               value="<?php echo htmlspecialchars($libro['editorial']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="carrera">Carrera:</label>
                        <select name="carrera" id="carrera" class="form-control" required>
                            <option value="" disabled selected>Seleccione una carrera</option>
                            <?php while ($carrera = mysqli_fetch_assoc($result_carreras)): ?>
                                <option value="<?php echo $carrera['id_carrera']; ?>"
                                    <?php echo ($carrera['id_carrera'] == $libro['carrera']) ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($carrera['nombre_carrera']); ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-secondary">Guardar Cambios</button>
                </form>
            </div>
        </section>
    </div>
</body>
</html>