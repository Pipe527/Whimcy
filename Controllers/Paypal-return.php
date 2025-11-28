<?php

session_start();
require_once("../Conexion.php");
require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../', 'Config.env');
$dotenv->load();

$clientId  = $_ENV['PAYPAL_CLIENT_ID'];
$secret    = $_ENV['PAYPAL_SECRET'];
$baseUrl   = $_ENV['PAYPAL_BASE_URL'];

// VALIDAR TOKEN QUE ENVÍA PAYPAL
if (!isset($_GET['token'])) {
    die("Error: PayPal no devolvió el token.");
}

$orderId = $_GET['token'];
$userId = $_SESSION["idUsuarios"];
$sessionOrder = $_SESSION['paypal_order_id'] ?? null;

if ($orderId !== $sessionOrder) {
    die("Error: el token no coincide con la orden creada.");
}

// --- 1. OBTENER ACCESS TOKEN ---
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "$baseUrl/v1/oauth2/token");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, "$clientId:$secret");
curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

$tokenResult = curl_exec($ch);
curl_close($ch);

$tokenData = json_decode($tokenResult, true);
$accessToken = $tokenData['access_token'] ?? null;

if (!$accessToken) {
    die("No se pudo generar token de PayPal.");
}

// --- 2. CAPTURAR ORDEN ---
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "$baseUrl/v2/checkout/orders/$orderId/capture");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{}");
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer $accessToken"
]);

$captureResult = curl_exec($ch);
curl_close($ch);

$data = json_decode($captureResult, true);

// Si algo falla
if (!isset($data["status"]) || $data["status"] !== "COMPLETED") {
    echo "<h3>Error al capturar el pago</h3>";
    echo "<pre>" . json_encode($data, JSON_PRETTY_PRINT) . "</pre>";
    exit;
}
if (!isset($data["purchase_units"][0]["payments"]["captures"][0])) {
    die("La captura de PayPal no contiene los datos esperados.");
}



// --- 3. VALIDAR CAPTURA ---
$paypalOrderId = $data["id"];
$captureId = $data["purchase_units"][0]["payments"]["captures"][0]["id"];

$total  = floatval($data["purchase_units"][0]["payments"]["captures"][0]["amount"]["value"]);
$moneda = $data["purchase_units"][0]["payments"]["captures"][0]["amount"]["currency_code"];

$payerEmail = $data["payer"]["email_address"] ?? "unknown";

if (!$userId) { $userId = 0;}
$itemsJson = json_encode($_SESSION["order_cart"] ?? []);
$metodo = "paypal";
$status = "completed";

// --- 4. GUARDAR EN BD ---
$stmt = $Con->prepare("
    INSERT INTO ordernes 
    (user_id, paypal_order_id, capture_id, total, moneda, payer_email, metodo, items_json, status) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
");

$stmt->bind_param(
    "issdsssss",
    $userId,
    $paypalOrderId,
    $captureId,
    $total,
    $moneda,
    $payerEmail,
    $metodo,
    $itemsJson,
    $status
);

$stmt->execute();
$stmt->close();

// --- 5. Limpiar carrito ---
unset($_SESSION["order_cart"]);
unset($_SESSION["order_subtotal"]);
unset($_SESSION["paypal_order_id"]);

$check = $Con->prepare("SELECT id FROM ordernes WHERE capture_id = ?");
$check->bind_param("s", $captureId);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    header("Location: ../Views/SuccesPay.php?success=1&already=1");
    exit;
}
?>
