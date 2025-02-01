<?php 
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION["adminpanel_autentificado"]) || $_SESSION["adminpanel_autentificado"] != "SI") {
    echo '
    <script>
    location.href = "login.php";
    </script>
    ';
    exit();
}

$session_lifetime = 3600;

if (isset($_SESSION['adminpanel_login_time'])) {
    $session_age = time() - $_SESSION['adminpanel_login_time'];

    if ($session_age > $session_lifetime) {
        session_unset();    // Limpiar todas las variables de sesión
        session_destroy();  // Destruir la sesión
        echo '
        <script>
        alert("La sesión ha expirado por inactividad.");
        location.href = "login.php";
        </script>
        ';
        exit();
    } else {
        // Si aún no expira la sesión, actualizar el tiempo de inicio
        $_SESSION['adminpanel_login_time'] = time();
    }
} else {
    $_SESSION['adminpanel_login_time'] = time();
}
?>
