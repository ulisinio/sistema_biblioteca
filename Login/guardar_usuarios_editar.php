<?php

require "conexion.php";
// lo que va despues del POST son los nombres que tienen en el form
$id_usuario = $_POST['id'];
$nombres = addslashes($_POST['nombres']);
$apellidos = addslashes($_POST['apellidos']);
$correo = addslashes($_POST['correo']);
$contrasena = addslashes($_POST['contrasena']);
$fechanacimiento = addslashes($_POST['fechanacimiento']);
$contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

$actualizar = "UPDATE usuarios SET nombres='$nombres', apellidos='$apellidos', correo='$correo', contrasena='$contrasena_encriptada', fechanacimiento='$fechanacimiento' WHERE id='$id_usuario' ";

$query = mysqli_query($conectar, $actualizar);

if ($query) {
    echo '
    <script>
    alert("Se guardaron correctamente los datos");
    location.href="ver_usuario.php?id=' . $id_usuario . '";
    </script>
    ';
} else {
    echo '
    <script>
    alert("No se guardaron los datos");
    location.href="usuarios.php?id=' . $id_usuario . '";
    </script>
    ';
}
?>