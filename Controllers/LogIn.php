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

    if (empty($Usuario)) {
        echo "<script>alert('El usuario es requerido'); </script>";
        exit(); 
    } elseif (empty($Clave)) {
        echo "<script>alert('La contraseña es requerida'); </script>";
        exit(); 
    } else {
        $Sql = "SELECT * FROM usuarios WHERE Correo = '$Usuario' AND Contraseña = '$Clave'";
        $Result = mysqli_query($Con, $Sql);

        if (mysqli_num_rows($Result) > 0) {
            $row = mysqli_fetch_assoc($Result);
            if ($row['Correo'] === $Usuario && $row['Contraseña'] === $Clave) {
                $_SESSION['Correo'] = $row['Correo'];
                $_SESSION['Nombre'] = $row['Nombre'];
                $_SESSION['idUsuarios'] = $row['idUsuarios'];
                header("Location: ../views/Index.html");
                exit();
            } else {
                echo "<script>alert('El usuario o la contraseña son incorrectos'); window.location.href='../views/login.html';</script>";
                exit();
            }
        } else {
            echo "<script>alert('El usuario o la contraseña son incorrectos'); window.location.href='../views/login.html';</script>";
            exit();
        }
    }
} else {
    header("Location: ../views/index.html");
    exit();
}

?>
