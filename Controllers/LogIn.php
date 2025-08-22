<?php 
require_once("../Conexion.php");
session_start();

if (isset($_POST["Email"]) && isset($_POST["Pass"])) {
    function validar($Data) {
        $Data = trim($Data);
        $Data = stripslashes($Data);
        $Data = htmlspecialchars($Data);
        return $Data;
    }

    $Usuario = validar($_POST["Email"]);
    $Clave = validar($_POST["Pass"]);
    $mobile = validar($_POST['mobile']);
    $_SESSION['mobile'] = $mobile; //Variable para Movíl

    if (empty($Usuario)) {
        echo "<script>alert('El usuario es requerido'); window.location.href='../views/login.html';</script>";
        exit(); 
    } elseif (empty($Clave)) {
        echo "<script>alert('La contraseña es requerida'); window.location.href='../views/login.html';</script>";
        exit(); 
    } else {
        $Sql = "SELECT * FROM usuarios WHERE Correo = ? AND Contraseña = ?";
        $stmt = $Con->prepare($Sql);
        $stmt->bind_param("ss", $Usuario, $Clave);
        $stmt->execute();
        $Result = $stmt->get_result();

        if ($Result->num_rows > 0) {
            $row = $Result->fetch_assoc();
            if ($row['Correo'] === $Usuario && $row['Contraseña'] === $Clave) {
                $_SESSION['Correo'] = $row['Correo'];
                $_SESSION['Nombre'] = $row['Nombre'];
                $_SESSION['idUsuarios'] = $row['idUsuarios'];
                if ($mobile == '1') {
                    header("Location: ../views/products.php");
                    exit();
                }else {
                   header("Location: ../views/Index.html");
                    exit();
                }
            } else {
                if ($mobile == '1') {
                    echo "<script>alert('El usuario o la contraseña son incorrectos'); window.location.href='../views/Mobile/Inicio.php';</script>";
                    exit();
                }else {
                    echo "<script>alert('El usuario o la contraseña son incorrectos'); window.location.href='../views/login.html';</script>";
                    exit();
                } 
            }
        } else {
            if ($mobile == '1') {
                    echo "<script>alert('El usuario o la contraseña son incorrectos'); window.location.href='../views/Mobile/Inicio.php';</script>";
                    exit();
                }else {
                    echo "<script>alert('El usuario o la contraseña son incorrectos'); window.location.href='../views/login.html';</script>";
                    exit();
            }
        }
    }
} else {
    header("Location: ../views/index.html");
    exit();
}
?>
