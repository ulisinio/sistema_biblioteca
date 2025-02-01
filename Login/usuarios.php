<?php 
    include "seguridad.php";
    $usuario = $_SESSION['adminpanel_username'];

    // Conectar a la base de datos
    include "conexion.php"; // Asegúrate de que este archivo contiene la conexión a la base de datos

    // Consultar los datos de la tabla usuarios
    $query = "SELECT * FROM usuarios";
    $result = mysqli_query($conectar, $query);
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
                <h1>USUARIOS</h1>
                <br>
                <a href="crear_usuario.php" class="btn-new">Crear Usuario</a>
<br><br><br>
                <!-- Tabla de Datos -->
                <table>
                    <thead>
                        <tr>
                            <th class="especial">ID</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Correo</th>
                            <th class="especial">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($fila = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($fila['id']); ?></td>
                                <td><?php echo htmlspecialchars($fila['nombres']); ?></td>
                                <td><?php echo htmlspecialchars($fila['apellidos']); ?></td>
                                <td><?php echo htmlspecialchars($fila['correo']); ?></td>
                                <td class="actions">
                                    <a href="ver_usuario.php?id=<?php echo $fila['id']; ?>" class="btn-view"><img src="images/ojo.png" alt=""></a>
                                    <a href="editar_usuario.php?id=<?php echo $fila['id']; ?>" class="btn-edit"><img src="images/editar.png" alt=""></a>
                                    <a href="#" onClick="validar('eliminar_usuario.php?id=<?php echo $fila['id']; ?>')" class="btn-delete"><img src="images/borrar.png" alt=""></a>
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
            var eliminar = confirm ("¿Seguro que quieres eliminar este dato?");
            if (eliminar == true) {
                window.location = url;
            }
        }
    </script>
</body>
</html>