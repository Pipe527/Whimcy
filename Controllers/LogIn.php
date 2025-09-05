<?php 
require_once("../Conexion.php");
session_start();

function validar($Data) {
    $Data = trim($Data);
    $Data = stripslashes($Data);
    $Data = htmlspecialchars($Data);
    return $Data;
}

if (isset($_POST["Email"]) && isset($_POST["Pass"])) {
    $Usuario = validar($_POST["Email"]);
    $Clave   = validar($_POST["Pass"]);
    $mobile  = isset($_POST['mobile']) ? validar($_POST['mobile']) : null;
    $_SESSION['mobile'] = $mobile;

    if (empty($Usuario)) {
        echo "<script>alert('El usuario es requerido'); window.location.href='../views/login.html';</script>";
        exit(); 
    }

    if (empty($Clave)) {
        echo "<script>alert('La contraseña es requerida'); window.location.href='../views/login.html';</script>";
        exit(); 
    }

    $Sql = "SELECT * FROM usuarios WHERE Correo = ?";
    $stmt = $Con->prepare($Sql);
    $stmt->bind_param("s", $Usuario);
    $stmt->execute();
    $Result = $stmt->get_result();

    if ($Result->num_rows > 0) {
        $row = $Result->fetch_assoc();

        if (password_verify($Clave, $row['Contraseña'])) {
            $_SESSION['Correo']     = $row['Correo'];
            $_SESSION['Nombre']     = $row['Nombre'];
            $_SESSION['idUsuarios'] = $row['idUsuarios'];
            $_SESSION['Nickname']   = $row['Nickname'];   
            $_SESSION['Celular']    = $row['Celular'];
            $_SESSION['Dirección']  = $row['Dirección'];

            if ($mobile === '1') {
                header("Location: ../views/products.php");
            } else {
                header("Location: ../views/Index.html");
            }
            exit();
        }
    }

    // Si no pasó el login
    if ($mobile === '1') {
        echo "<script>alert('El usuario o la contraseña son incorrectos'); window.location.href='../views/Mobile/Inicio.php';</script>";
    } else {
        echo "<script>alert('El usuario o la contraseña son incorrectos'); window.location.href='../views/login.html';</script>";
    }
    exit();
} else {
    header("Location: ../views/index.html");
    exit();
}
?>
