<?php
require_once("../Conexion.php");
 
header('Content-Type: application/json'); // respuesta en JSON

$email = trim($_POST['email'] ?? '');

if (empty($email)) {
    echo json_encode(["status" => "error", "message" => "Debe ingresar un correo"]);
    exit;
}
// Consulta
$sql = "SELECT correo FROM usuarios WHERE correo = ? LIMIT 1";
$stmt = $Con->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Enviar correo de recuperación - En entorno real se valida con tokken o PHPMailer
    echo json_encode(["status" => "success", "message" => "Correo enviado"]);
} else {
    echo json_encode(["status" => "error", "message" => "El correo ingresado no se encuentra registrado"]);
}

