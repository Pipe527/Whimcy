<?php
require_once(__DIR__ . "/../Conexion.php");
session_start();

if (!isset($_SESSION['idUsuarios'])) {
    echo json_encode(["status" => "error", "message" => "Usuario no autenticado"]);
    exit;
}

$userId = $_SESSION['idUsuarios'];

// Guardar método de pago
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $method = $_POST['method'] ?? null;
    if (!$method) {
        echo json_encode(["status" => "error", "message" => "Método no recibido"]);
        exit;
    }

    $details = [];
    $errors = [];

    if (
        ($method === "daviplata" && empty($_POST['daviplataNumber'])) ||
        ($method === "card" && empty($_POST['cardNumber']) && empty($_POST['cardExpiry'])) ||
        ($method === "paypal" && empty($_POST['paypalEmail']))
    ) {
        // Llega método no concreto
        $details = ["type" => strtolower($method)];
    } else {
        switch (strtolower($method)) {
            case "daviplata":
              // Minimo 6
                $number = $_POST['daviplataNumber'] ?? '';
                if (!preg_match('/^[0-9]{6,20}$/', $number)) {
                    $errors[] = "Número Daviplata inválido";
                } else {
                    $details = ["type" => "daviplata", "number" => substr($number, -4)];
                }
                break;

            case "card":
                $card = $_POST['cardNumber'] ?? '';
                $expiry = $_POST['cardExpiry'] ?? '';
                // Entre 13 - 19
                if (!preg_match('/^[0-9]{13,19}$/', $card)) {
                    $errors[] = "Número de tarjeta inválido";
                }
                if ($expiry) {
                    $expParts = explode("-", $expiry);
                    if (count($expParts) === 2) {
                        [$year, $month] = $expParts;
                        $current = date("Ym");
                        if ((int)($year . $month) < (int)$current) {
                            $errors[] = "La tarjeta está vencida";
                        }
                    } else {
                        $errors[] = "Fecha de expiración inválida";
                    }
                } else {
                    $errors[] = "Fecha de expiración requerida";
                }

                if (empty($errors)) {
                    $details = [
                        "type"   => "card",
                        "brand"  => "VISA",
                        "last4"  => substr($card, -4),
                        "expiry" => $expiry
                    ];
                }
                break;

            case "paypal":
                $email = $_POST['paypalEmail'] ?? '';
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "Correo de PayPal inválido";
                } else {
                    $details = ["type" => "paypal", "email" => $email];
                }
                break;

            default:
                $errors[] = "Método de pago no reconocido";
                break;
        }
    }
    // Pasar el error JSON
    if (!empty($errors)) {
        header("Content-Type: application/json");
        echo json_encode(["status" => "error", "message" => implode(", ", $errors)]);
        exit;
    }

    // Comprobar si existe y hacer Insert/Update
    $stmt = $Con->prepare("SELECT id FROM pagos WHERE user_id=? LIMIT 1");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows) {
        $stmt = $Con->prepare("UPDATE pagos SET metodo=?, detalles=? WHERE user_id=?");
        $jsonDetails = json_encode($details);
        $stmt->bind_param("ssi", $method, $jsonDetails, $userId);
        $stmt->execute();
    } else {
        $stmt = $Con->prepare("INSERT INTO pagos (user_id, metodo, detalles) VALUES (?, ?, ?)");
        $jsonDetails = json_encode($details);
        $stmt->bind_param("iss", $userId, $method, $jsonDetails);
        $stmt->execute();
    }
    header("Content-Type: application/json");
    echo json_encode([
        "status" => "success",
        "message" => "Método de pago actualizado",
        "data" => $details
    ]);
    exit;
}

// GET → mostrar formulario dinámico con default
$stmt = $Con->prepare("SELECT metodo, detalles FROM pagos WHERE user_id=? LIMIT 1");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$metodo = $details = null;
if ($row = $result->fetch_assoc()) {
    $metodo = $row['metodo'];
    $details = json_decode($row['detalles'], true);
}
?>

<!-- HTML dinamico (Por GET)-->
<div class="container py-5 b-e">
  <h3 class="text-center mb-4">Editar Método de Pago</h3>
  <form id="payment-form" class="payment-form card shadow p-4" method="post">
    <div class="mb-3">
      <label for="method" class="form-label a-c">Método</label>
      <select id="method" name="method" class="form-select" required>
        <option value="">Selecciona...</option>
        <option value="daviplata">Daviplata</option>
        <option value="card">Tarjeta</option>
        <option value="paypal">PayPal</option>
      </select>
    </div>

    <div class="mb-3 d-none" id="daviplataFields">
      <label for="daviplataNumber" class="form-label a-c">Número Daviplata</label>
      <input type="text" id="daviplataNumber" name="daviplataNumber" class="form-control">
    </div>

    <div class="mb-3 d-none" id="cardFields">
      <label for="cardNumber" class="form-label a-c">Número de tarjeta</label>
      <input type="text" id="cardNumber" name="cardNumber" class="form-control" maxlength="16">
      <label for="cardExpiry" class="form-label a-c mt-2">Fecha de expiración</label>
      <input type="month" id="cardExpiry" name="cardExpiry" class="form-control">
    </div>

    <div class="mb-3 d-none" id="paypalFields">
      <label for="paypalEmail" class="form-label a-c">Correo de PayPal</label>
      <input type="email" id="paypalEmail" name="paypalEmail" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary w-100">Guardar</button>
    <button class="btn btn-primary btn-flex b" onclick= "CancelarEdit(event)" type="button">Cancelar</button>
  </form>
  <div id="response" class="mt-3"></div>
</div>
