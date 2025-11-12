<?php
require_once("../Conexion.php");
session_start();

header('Content-Type: application/json');

if (!isset($_SESSION['idUsuarios'])) {
		echo json_encode([
    	    "success" => false,
    	    "message" => "Usuario no autenticado",
    	    "redirect" => "../Views/login.html"
    	]);
		exit;
	}

$userId = $_SESSION['idUsuarios'];

$input = json_decode(file_get_contents("php://input"), true);

// Correo por defecto
if (isset($input['action']) && $input['action'] === 'getDefaultEmail') {
    $stmt = $Con->prepare("SELECT detalles FROM pagos WHERE user_id = ? LIMIT 1");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $detalles = json_decode($row['detalles'], true);
        echo json_encode([
            "success" => true,
            "email" => $detalles['email'] ?? null
        ]);
    } else {
        echo json_encode(["success" => false, "message" => "No hay método registrado"]);
    }
    exit;
}

// Control del POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$methodCode = $_POST['metodo'] ?? null;
	$errors = [];

	if (!$methodCode) {
        echo json_encode(["status" => "error", "message" => "Método no recibido"]);
        exit;
    } 
	
	$details = [];

    switch (strtoupper($methodCode)) {
        case 'A':
            $method = "PayPal";
            $email = $_POST['paypalEmail'] ?? '';
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Correo de PayPal inválido";
            } else {
                $details = ["type" => "paypal", "email" => $email];
            }
            break;

        case 'B':
            $method = "Daviplata";
            $number = $_POST['daviplataNumber'] ?? '';
            if (!preg_match("/^[0-9]{10}$/", $number)) {
                $errors[] = "Número de Daviplata inválido";
            } else {
                $details = ["type" => "daviplata", "number" => $number];
            }
            break;

        case 'C':
            $method = "Tarjeta";
            $card = $_POST['cardNumber'] ?? '';
            $exp = $_POST['cardExpDate'] ?? '';
            if (strlen($card) < 12) {
                $errors[] = "Número de tarjeta inválido";
            } else {
                $details = ["type" => "tarjeta", "number" => $card, "exp" => $exp];
            }
            break;

        default:
            echo json_encode(["success" => false, "message" => "Método no válido"]);
            exit;
    }

	if ($errors) {
        echo json_encode(["success" => false, "message" => implode(", ", $errors)]);
        exit;
    }
	// Guardar en Json
    $jsonDetails = json_encode($details);

    // Verificar metodos
    $stmt = $Con->prepare("SELECT id FROM pagos WHERE user_id = ? LIMIT 1");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows) {
        // Actualizar
        $row = $result->fetch_assoc();
        $update = $Con->prepare("UPDATE pagos SET metodo=?, detalles=? WHERE id=?");
        $update->bind_param("ssi", $method, $jsonDetails, $row['id']);
        $update->execute();
        $update->close();
    } else {
        // Insertar
        $insert = $Con->prepare("INSERT INTO pagos (user_id, metodo, detalles) VALUES (?, ?, ?)");
        $insert->bind_param("iss", $userId, $method, $jsonDetails);
        $insert->execute();
        $insert->close();
    }

    echo json_encode([
        "success" => true,
        "message" => "Método de pago registrado correctamente",
        "data" => $details
    ]);
    exit;
}

// Si no es POST
echo json_encode(["success" => false, "message" => "Método HTTP no permitido"]);
exit;

?>