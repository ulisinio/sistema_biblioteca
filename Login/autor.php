<?php 
include "seguridad.php";
$usuario = $_SESSION['adminpanel_username'];

// Conectar a la base de datos
include "conexion.php"; // Asegúrate de que este archivo contiene la conexión a la base de datos

// Consultar los datos de la tabla autores
$query = "SELECT * FROM autores";
$result = mysqli_query($conectar, $query);

// Verifica si la consulta tuvo éxito
if (!$result) {
    echo "Error al realizar la consulta: " . mysqli_error($conectar);
    exit; // Detener la ejecución si hay un error
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo - Autores</title>
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
                <h1>AUTORES</h1>
                <br>
                <a href="crear_autor.php" class="btn-new">Crear Autor</a>
                <a href="json_autores.php" class="btn-new2">Generar JSON</a>
                <br><br><br>

                <!-- Tabla de Datos -->
                <table>
                    <thead>
                        <tr>
                            <th class="especial">ID Autor</th>
                            <th>Nombre</th>
                            <th>Nacionalidad</th>
                            <th class="especial">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($fila = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($fila['id_autor']); ?></td>
                                <td><?php echo htmlspecialchars($fila['nombre']); ?></td>
                                <td><?php echo htmlspecialchars($fila['nacionalidad']); ?></td>
                                <td class="actions">
    <a href="ver_autor.php?id_autor=<?php echo $fila['id_autor']; ?>" class="btn-view"><img src="images/ojo.png" alt=""></a>
    <a href="editar_autor.php?id_autor=<?php echo $fila['id_autor']; ?>" class="btn-edit"><img src="images/editar.png" alt=""></a>
    <a href="#" onClick="validar('eliminar_autor.php?id_autor=<?php echo $fila['id_autor']; ?>')" class="btn-delete"><img src="images/borrar.png" alt=""></a>
</td>

                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
    <script>
        function validar(url) {
            var eliminar = confirm("¿Seguro que quieres eliminar este autor?");
            if (eliminar == true) {
                window.location = url;
            }
        }
    </script>
</body>
</html>
