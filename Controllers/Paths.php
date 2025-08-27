<?php
// Rutas dinamicas segun Localhost / Dominio
$protocolo = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$host = $_SERVER['HTTP_HOST']; 
$carpeta = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\'); // ruta relativa al proyecto
$base = $protocolo . "://" . $host . "/whimcy";

?>