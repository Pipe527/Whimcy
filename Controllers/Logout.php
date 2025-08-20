<?php
session_start();
// realizar verificaciones
session_unset();
session_destroy();
header("Location: ../views/Index.html");
// if ($mobile == '1') {
//     header("../views/Mobile/Inicio.php");
// }else {
//     header("../views/login.html");
// }

?>
