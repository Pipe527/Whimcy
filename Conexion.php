<?php
$server = "Localhost";
$User = "root";
$Password = "";
$Database = "auto";

$Con = new mysqli($server, $User, $Password, $Database);
if ($Con->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $Con->connect_errno . ") " . $Con->connect_error;
}

//echo "Conexion exitosa" . "\n";
?>