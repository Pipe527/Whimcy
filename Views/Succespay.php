<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once("../Conexion.php");

// Si no hay usuario logueado
if (!isset($_SESSION["idUsuarios"])) {
    header("Location: index.html");
    exit;
}
// Evitar acceso directo sin success.
if (!isset($_GET['success'])) {
    header("Location: index.html");
    exit;
}

$userId = $_SESSION["idUsuarios"] ?? null;

// Buscar la última orden del usuario.
$stmt = $Con->prepare(" SELECT * FROM ordernes WHERE user_id = ? ORDER BY id DESC LIMIT 1");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$order = $result->fetch_assoc();
$stmt->close();

// Si por alguna razón no encuentra la orden
if (!$order) {
    die("No se encontró la orden del usuario en la base de datos.");
}

// Si NO hay orden, parar.
if (!$order) {
    die("No se encontró la orden en la base de datos.");
}

$transactionID = $order["capture_id"];
$paypalOrderId = $order["paypal_order_id"];
$monto = $order["total"];
$currency = $order["moneda"];
$status = $order["status"];
$payerEmail = $order["payer_email"];
$items = json_decode($order["items_json"], true);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Pago exitoso</title>
    <style>
        body{
            background: #f5f7fa;
        }
        .success-card{
            max-width: 500px;
            margin: 70px auto;
            background: #fff;
            padding: 30px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,.1);
        }
        .success-icon{
            font-size: 60px;
            color: #28a745;
            margin-bottom: 15px;
        }
        .btn-main{
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header class="header"><?php include_once("Menu.php") ?></header>
    <div class="success-card">
        <div class="success-icon">✔️</div>
        <h2>¡Pago Completado!</h2>
        <p>Tu transacción ha sido procesada exitosamente.</p>

        <hr>

        <p><strong>ID Transacción:</strong> <?= $transactionID ?></p>
        <p><strong>Email del Pagador:</strong> <?= $payerEmail ?></p>
        <p><strong>Monto:</strong> <?= $monto . " " . $currency ?></p>
        <p><strong>Estado:</strong> <?= $status ?></p>

        <a href="../index.php" class="btn btn-primary btn-main">Volver a la tienda</a>
        <a href="recibo.php?id=<?= $transactionID ?>" class="btn btn-success btn-main">Ver Recibo</a>
    </div>
    <footer>
        <?php   include_once("footer.html") ?>  
    </footer>
    <style>
     /* Reajustes */
     .Letras ul i[class="fa fa-cart-arrow-down"]:hover {
        cursor: unset;
     }
     @media (min-width: 992px) {
        .col-md-8 {
            float: unset !important;
        }
     }
    </style>
    <!-- Abrir Submenus -->
    <script src="/whimcy/JS/SubMenus.js"></script>
    <script>
        function disableCartBtn() {
            const btnNav = document.querySelector(".w3view-cart");
            if (!btnNav) return false;
            btnNav.type = "button";
            btnNav.disabled = true;
            btnNav.style.opacity = "0.8";
            btnNav.style.cursor = "not-allowed";
            return true;
        }
        disableCartBtn();
    </script>
    <script>
     $(function() {
      if (typeof inicializarHeaderNav === "function") inicializarHeaderNav();
      if (typeof inicializarLogin === "function") inicializarLogin();
     });
    </script>
</body>
</html>