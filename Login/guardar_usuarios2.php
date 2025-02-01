<?php

require "conexion.php";

$nombres = addslashes($_POST['nombres']);
$apellidos = addslashes($_POST['apellidos']);
$correo = addslashes($_POST['correo']);
$contrasena = addslashes($_POST['contrasena']);
$fechanacimiento = addslashes($_POST['fechanacimiento']);
$contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);



//Validar usuario
$verificar_usuario = mysqli_query($conectar, "SELECT * FROM usuarios WHERE correo = '$correo' ");
if (mysqli_num_rows($verificar_usuario) > 0){
    echo '
    <script>
    alert("Este usuario ya existe");
    location.href="crear_usuario.php";
    </script>
    ';
    exit;
}
$insertar = "INSERT INTO usuarios (nombres, apellidos, correo, contrasena, fechanacimiento) VALUES ('$nombres', '$apellidos', '$correo', '$contrasena_encriptada', '$fechanacimiento')";

$query = mysqli_query($conectar, $insertar);

if ($query) {
    echo '
    <script>
    alert("Se guardaron correctamente los datos");
    location.href="usuarios.php";
    </script>
    ';
} else {
    echo '
    <script>
    alert("No se guardaron los datos");
    location.href="nueva_cuenta.php";
    </script>
    ';
}
?>