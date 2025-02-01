<?php 
include "seguridad.php";
$usuario = $_SESSION['adminpanel_username'];

// Conectar a la base de datos
include "conexion.php";

// Número de registros por página
$registros_por_pagina = 5;

// Verificar la página actual
$pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$inicio = ($pagina_actual - 1) * $registros_por_pagina;

// Consulta base
$query = "
    SELECT libros.id_libro, libros.titulo, autores.nombre AS nombre_autor,
           libros.anio, libros.editorial, carreras.nombre_carrera
    FROM libros
    JOIN autores ON libros.autor = autores.id_autor
    JOIN carreras ON libros.carrera = carreras.id_carrera";

// Verificar si se ha enviado una búsqueda
if (isset($_POST['buscar'])) {
    $titulo = mysqli_real_escape_string($conectar, $_POST['busca_titulo']);
    $query .= " WHERE libros.titulo LIKE '%$titulo%'";
}

// Obtener el total de registros
$result_total = mysqli_query($conectar, $query);
$total_filas = mysqli_num_rows($result_total);
$total_paginas = ceil($total_filas / $registros_por_pagina);

// Agregar límite para la paginación
$query .= " LIMIT $inicio, $registros_por_pagina";

// Ejecutar la consulta final
$result = mysqli_query($conectar, $query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo - Libros</title>
    <link rel="stylesheet" href="styles_admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body>
    <div class="container">
        <?php include "menu.php"; ?>

        <section class="main-content">
            <div class="header">
                <a href="salir.php" class="btn-logout">Cerrar Sesión</a>
            </div>
            <div class="content">
                <h1>LIBROS</h1>
                <br>
                <a href="crear_libro.php" class="btn-new">Crear Libro</a>
                <a href="libros.php" class="btn-new2">VER TODOS</a>
                <a href="reporte_libros.php" class="btn-new3">Descargar Reporte (.pdf)</a>
                <br>

                <!-- Barra de búsqueda -->
                <form method="POST" action="libros.php" class="search-bar">
                    <input type="text" name="busca_titulo" class="search-input" placeholder="Buscar por título">
                    <button type="submit" name="buscar" class="search-label">Buscar</button>
                </form>

                <br>
                <table>
                    <thead>
                        <tr>
                            <th class="especial">ID Libro</th>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Año</th>
                            <th>Editorial</th>
                            <th>Carrera</th>
                            <th class="especial">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($result) > 0): ?>
                            <?php while ($fila = mysqli_fetch_assoc($result)): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($fila['id_libro']); ?></td>
                                    <td><?php echo htmlspecialchars($fila['titulo']); ?></td>
                                    <td><?php echo htmlspecialchars($fila['nombre_autor']); ?></td>
                                    <td><?php echo htmlspecialchars($fila['anio']); ?></td>
                                    <td><?php echo htmlspecialchars($fila['editorial']); ?></td>
                                    <td><?php echo htmlspecialchars($fila['nombre_carrera']); ?></td>
                                    <td class="actions">
                                        <a href="ver_libro.php?id=<?php echo $fila['id_libro']; ?>" class="btn-view">
                                            <img src="images/ojo.png" alt="">
                                        </a>
                                        <a href="editar_libro.php?id=<?php echo $fila['id_libro']; ?>" class="btn-edit">
                                            <img src="images/editar.png" alt="">
                                        </a>
                                        <a href="#" onClick="validar('eliminar_libro.php?id=<?php echo $fila['id_libro']; ?>')" class="btn-delete">
                                            <img src="images/borrar.png" alt="">
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center">No hay coincidencias con tu búsqueda</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <!-- Paginación -->
                <div class="paginacion-libros">
                    <a href="?pagina=<?php echo max(1, $pagina_actual - 1); ?>" 
                       class="paginacion-enlace <?php if ($pagina_actual == 1) echo 'deshabilitado'; ?>">
                       « Anterior
                    </a>

                    <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                        <a href="?pagina=<?php echo $i; ?>" 
                           class="paginacion-enlace <?php if ($i == $pagina_actual) echo 'activo'; ?>">
                           <?php echo $i; ?>
                        </a>
                    <?php endfor; ?>

                    <a href="?pagina=<?php echo min($total_paginas, $pagina_actual + 1); ?>" 
                       class="paginacion-enlace <?php if ($pagina_actual == $total_paginas) echo 'deshabilitado'; ?>">
                       Siguiente »
                    </a>
                </div>
            </div>
        </section>
    </div>
    <script>
        function validar(url) {
            var eliminar = confirm("¿Seguro que quieres eliminar este dato?");
            if (eliminar) {
                window.location = url;
            }
        }
    </script>
</body>
</html>
