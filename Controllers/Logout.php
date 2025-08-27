<?php
session_start();
// realizar verificaciones
//Movíl
$Movil = $_SESSION['mobile'] ?? 0; // valor 0 si no existe
// Vaciar sesión
$_SESSION = [];
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_unset();
session_destroy();

if ($Movil == 1) {
    header("Location:../views/Mobile/Inicio.php");
}else {
    header("Location:../views/login.html");
}
exit;
?>
