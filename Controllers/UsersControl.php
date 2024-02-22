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
?>