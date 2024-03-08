<?php

require_once("../Models/ClUsuarios.php");
require_once("../Conexion.php");

$Nombre = $_POST["Nombre"];
$Apellido = $_POST["Apellido"];
$Nickname = $_POST["Nickname"];
$Telefono = $_POST["Phone"];
$Email = $_POST["Correo"];
$Pass = $_POST["Pass"];
$Bday = $_POST["Bday"];
$Address = $_POST["Direccion"];

$User = new Usuarios ($Nombre,$Apellido,$Nickname,$Telefono,$Email,$Pass,$Bday,$Address);

$a= $user->getNombre();
$b= $user->getApellido();
$c= $user->getNick();
$d= $user->getPhone();
$e= $user->getEmail();
$f= $user->getPass();
$g= $user->getBday();
$h= $user->getAddress();

if isset($_POST["Crear"]){
    $sql = "INSERT INTO `usuarios` (`Nombre`, `Apellido`, `Nickname`, `Correo`, `Contraseña`, `Celular`, `F.Nacimiento`, `Dirección`) 
            VALUES (NULL, '$a', '$b', '$c', '$d', '$e', '$f', '$g', '$h')";
            
         if ($Con->query($sql)) {
             echo "Datos guardados correctamente";
         } else {
             echo "Error";
         }
    }

    $Con->close();
?>