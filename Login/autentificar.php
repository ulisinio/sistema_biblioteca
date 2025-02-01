<?php
require "conexion.php";

$correo = addslashes($_POST['correo']);
$contrasena = addslashes($_POST['contrasena']);

$comparar = "SELECT * FROM usuarios WHERE correo='$correo' LIMIT 1";

$resultado = mysqli_query($conectar, $comparar);

if (mysqli_num_rows($resultado) > 0) {

    $fila = $resultado->fetch_array();

    if (password_verify($contrasena, $fila["contrasena"])) {
        session_start();
        // Usamos prefijos únicos para las variables de sesión
        $_SESSION['adminpanel_username'] = $correo;
        $_SESSION['adminpanel_autentificado'] = "SI";
        header("Location: principal.php");
    } else {
        echo '
        <script>
        location.href = "login.php?errorusuario=SI";
        </script>
        ';
    }
}

mysqli_free_result($resultado);
mysqli_close($conectar);

?>
