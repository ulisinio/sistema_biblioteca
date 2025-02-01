<?php 
require "seguridad.php";
session_start();
session_destroy();
?>
    <script type="text/javascript">
        alert('Has cerrado sesión correctamente');
        window.location.href = 'login.php'; // Redirige al login después de la alerta
    </script>