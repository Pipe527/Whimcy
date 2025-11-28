<?php
session_start();

// Cargar Composer
require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../', 'Config.env');
$dotenv->load();

// Variables PayPal desde ENV
$clientId  = $_ENV['PAYPAL_CLIENT_ID'];
$secret    = $_ENV['PAYPAL_SECRET'];
$baseUrl   = $_ENV['PAYPAL_BASE_URL'];
$returnUrl = $_ENV['RETURN_URL'];
$cancelUrl = $_ENV['CANCEL_URL'];

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../Views/cart.html");
    exit;
}

$metodo = $_POST['metodo'] ?? null;

// Carrito
$clientCart = json_decode($_POST['cart'] ?? "[]", true);

// Recalcular subtotal EN SERVIDOR (seguridad)
$subtotal = array_reduce($clientCart, function($s, $i) {
    $cant = $i['quantity'] ?? 1;
    $precio = $i['amount'] ?? 0;
    return $s + ($cant * $precio);
}, 0);

$subtotal = number_format($subtotal, 2, '.', '');

$_SESSION['order_subtotal'] = $subtotal;
$_SESSION['order_cart'] = $clientCart;

if ($metodo === "A") {

    // Generar ACCESS TOKEN
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
        die("No se pudo generar token de PayPal: <pre>$tokenResult</pre>");
    }

    // Crear orden de pago
    $payload = [
        "intent" => "CAPTURE",
        "purchase_units" => [[
            "amount" => [
                "currency_code" => "USD",
                "value" => $subtotal
            ],
            "description" => "Compra tastely"
        ]],
        "application_context" => [
            "return_url" => $returnUrl,
            "cancel_url" => $cancelUrl,
            "user_action" => "PAY_NOW"
        ]
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "$baseUrl/v2/checkout/orders");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json",
        "Authorization: Bearer $accessToken"
    ]);

    $orderResult = curl_exec($ch);
    curl_close($ch);

    $order = json_decode($orderResult, true);

    if (!isset($order['links'])) {
        die("Error creando orden PayPal: <pre>$orderResult</pre>");
    }

    // Extraer approval_url
    $approvalUrl = null;
    foreach ($order['links'] as $link) {
        if ($link['rel'] === "approve") {
            $approvalUrl = $link['href'];
            break;
        }
    }

    if (!$approvalUrl) {
        die("No se encontró approval_url: <pre>$orderResult</pre>");
    }

    // Guardar ID de orden
    $_SESSION['paypal_order_id'] = $order['id'];

    // Redirigir a PayPal Sandbox
    header("Location: $approvalUrl");
    exit;
}

if ($metodo === "B") {
    header("Location: ../Views/simulacion-daviplata.php");
    exit;
}

if ($metodo === "C") {
    header("Location: ../Views/simulacion-tarjeta.php");
    exit;
}

echo "Método inválido.";
