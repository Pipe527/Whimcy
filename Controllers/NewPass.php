<?php 
require_once("../Conexion.php");
session_start(); 

function validar($Data) {
    $Data = trim($Data);
    $Data = stripslashes($Data);
    $Data = htmlspecialchars($Data);
    return $Data;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar contraseña</title>
    <link rel="stylesheet" href="../Css/RServer.css">
</head>
<body>
    <div class="server-response">
<?php

    function js_redirect($msg, $url) {
        echo "<script>alert(" . json_encode($msg) . "); window.location.href=" . json_encode($url) . ";</script>";
        exit();
    }

    function cambiarPassword($Con, $IdU, $Clave, $redirectUrl) {
        // Recuperar hash actual desde BD
        $sql = "SELECT Contraseña FROM usuarios WHERE idUsuarios = ?";
        $stmt = $Con->prepare($sql);
        $stmt->bind_param("i", $IdU);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $hashActual = $row['Contraseña'];

        if (password_verify($Clave, $hashActual)) {
            js_redirect('La nueva contraseña no puede ser igual a la anterior', $redirectUrl);
        }

        // Crear nuevo hash y actualizar
        $nuevoHash = password_hash($Clave, PASSWORD_DEFAULT);
        $sql = "UPDATE usuarios SET Contraseña = ? WHERE idUsuarios = ?";
        $stmt = $Con->prepare($sql);
        $stmt->bind_param("si", $nuevoHash, $IdU);

        if ($stmt->execute()) {
            echo "
                <div class='exito'>
                    Contraseña actualizada correctamente
                </div>
                <a href='../views/index.html' class='boton-regresar'>Regresar a inicio</a>
            ";
        } else {
            echo "<div class='error'>Error al actualizar la contraseña</div>";
        }
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $Clave     = validar($_POST["Pass2"] ?? '');
        $Confirmar = validar($_POST["Confpass"] ?? '');

        $isLogged = isset($_SESSION['idUsuarios']);
        $IdU      = $isLogged ? $_SESSION['idUsuarios'] : null;

        // Validaciones comunes
        if (empty($Clave) || empty($Confirmar)) {
            js_redirect('Debes ingresar y confirmar la contraseña', $isLogged ? '/whimcy/views/mobile/profile.php' : '/whimcy/views/PasswordB.php');
        }

        if ($Clave !== $Confirmar) {
            js_redirect('Las contraseñas no coinciden', $isLogged ? '/whimcy/views/mobile/profile.php' : '/whimcy/views/PasswordB.php');
        }

        // ¿Sesion iniciada?
        if ($isLogged) {
            cambiarPassword($Con, $IdU, $Clave, '/whimcy/views/mobile/profile.php');
        } else {
            // Se recibe correo - En entorno real se valida con tokken o PHPMailer
            // Otra logica lo recibe (SIMULAR con usuario aleatorio/ No Admin=6)
            $sql = "SELECT idUsuarios FROM usuarios WHERE idUsuarios NOT IN (6, 35) ORDER BY RAND() LIMIT 1";
            $result = $Con->query($sql);
            $row = $result->fetch_assoc();

            if (!$row) {
                js_redirect('No se encontraron usuarios en la base de datos', '/whimcy/views/PasswordB.php');
            }

            $IdU = $row['idUsuarios'];
            echo "<script>console.log('El usuario aleatorio es: " . $IdU . "');</script>";
            cambiarPassword($Con, $IdU, $Clave, '/whimcy/views/PasswordB.php');
        }
    }
?>
    </div>
</body>
</html>
