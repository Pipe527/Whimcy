<?php

require_once("../Models/ClUsuarios.php");
require_once("../Conexion.php");

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
    $sql = "INSERT INTO `usuarios` (`idUsuarios`,`Nombre`, `Apellido`, `Nickname`, `Correo`, `Contraseña`, `Celular`, `F. Nacimiento`, `Dirección`, `Medio de pago_idMedio de pago`) 
            VALUES (NULL, '$a', '$b', '$c', '$d', '$e', '$f', '$g', '$h', NULL)";
            
         if ($Con->query($sql)) {
             echo "Datos guardados correctamente";
         } else {
             echo "Error";
         }
    }

    $Con->close();
?>