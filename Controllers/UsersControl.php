<?php

require_once("../Models/ClUsuarios.php");
require_once("../Conexion.php");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>..</title>
    <link rel="stylesheet" href="../Css/RServer.css">
</head>
<body> <!-- CSS para datos del servidor -->
</body>
<?php

$Nombre = $_POST["Nombre"];
$Apellido = $_POST["Apellido"];
$Nickname = $_POST["Nickname"];
$Telefono = $_POST["Phone"];
$Email = $_POST["Correo"];
$Pass = $_POST["pass"];
$Bday = $_POST["Bday"];
$Address = $_POST["Direccion"];

$User = new Usuarios ($Nombre,$Apellido,$Nickname,$Email,$Pass,$Telefono,$Bday,$Address);

$a= $User->getNombre();
$b= $User->getApellido();
$c= $User->getNick();
$d= $User->getEmail();
$e= $User->getPass();
$f= $User->getPhone();
$g= $User->getBday();
$h= $User->getAddress();


    if (isset($_POST["Crear"])){
        $sql = "INSERT INTO `usuarios` (`idUsuarios`,`Nombre`, `Apellido`, `Nickname`, `Correo`, `Contraseña`, `Celular`, `F. Nacimiento`, `Dirección`)
                VALUES (NULL, '$a', '$b', '$c', '$d', '$e', '$f', '$g', '$h')";
            
             if ($Con->query($sql)) {
                 echo "<div class='Guardar'>Datos Guardados correctamente</div>";
                 echo "<a href='../views/index.html' class='boton-regresar'>Regresar a inicio</a>";
             } else {
                 echo "Error";
             }
        } elseif (isset($_POST["Editar"])){
            $id = $_POST["id"];
            $sql = "UPDATE `usuarios` SET `Nombre` = '$a', `Apellido` = '$b', `Nickname` = '$c', `Correo` = '$d', `Contraseña` = '$e',
            `Celular` = '$f', `F. Nacimiento` = '$g', `Dirección` = '$h' WHERE `usuarios`.`idUsuarios` = $id";
            
            if ($Con->query($sql)) {
                echo "<div class='exito'>Datos Actualizados correctamente</div>";
                echo "<a href='../views/index.html' class='boton-regresar'>Regresar a inicio</a>";
            } else {
                echo "<div class='error'>Error</div>";
            }
        }
    

    $Con->close();
?>