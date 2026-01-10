<?php
// Seguridad de sesión
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once("../Conexion.php");

// Validar usuario
if (!isset($_SESSION["idUsuarios"])) {
    header("Location: index.html");
    exit;
}

// Validar parámetro
if (!isset($_GET["id"])) {
    die("Recibo inválido.");
}

$captureId = $_GET["id"];
$userId = $_SESSION["idUsuarios"];

// Buscar la orden (solo del usuario)
$stmt = $Con->prepare("
    SELECT * 
    FROM ordernes 
    WHERE capture_id = ? AND user_id = ?
    LIMIT 1
");
$stmt->bind_param("si", $captureId, $userId);
$stmt->execute();
$result = $stmt->get_result();
$order = $result->fetch_assoc();
$stmt->close();

if (!$order) {
    die("No se encontró la orden o no tienes permisos para verla.");
}

// Datos de la orden
$items = json_decode($order["items_json"], true) ?? [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recibo de compra</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            background: #f5f7fa;
        }
        .receipt {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,.1);
        }
        .receipt h2 {
            margin-bottom: 20px;
        }
        .receipt table th {
            background: #f1f1f1;
        }
        .total {
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<header class="header">
    
</header>

<div class="receipt">
    <h2>🧾 Recibo de compra</h2>

    <p><strong>ID Transacción:</strong> <?= htmlspecialchars($order["capture_id"]) ?></p>
    <p><strong>Orden PayPal:</strong> <?= htmlspecialchars($order["paypal_order_id"]) ?></p>
    <p><strong>Estado:</strong> <?= htmlspecialchars($order["status"]) ?></p>
    <p><strong>Método de pago:</strong> <?= htmlspecialchars($order["metodo"]) ?></p>
    <p><strong>Email pagador:</strong> <?= htmlspecialchars($order["payer_email"]) ?></p>

    <hr>

    <h5>Productos</h5>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($items as $item): 
            $nombre = $item["w3ls_item"] ?? "Producto";
            $cantidad = $item["quantity"] ?? 1;
            $precio = $item["amount"] ?? 0;
            $subtotal = $cantidad * $precio;
        ?>
            <tr>
                <td><?= htmlspecialchars($nombre) ?></td>
                <td><?= $cantidad ?></td>
                <td><?= number_format($precio, 2) ?></td>
                <td><?= number_format($subtotal, 2) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <div class="text-end total">
        Total: <?= number_format($order["total"], 2) . " " . $order["moneda"] . " (COP)" ?>
    </div>

    <hr>

    <a href="index.html" class="btn btn-secondary">Volver a la tienda</a>
    <a href="javascript:window.print()" class="btn btn-primary">Imprimir</a>
</div>

<footer>
    <?php include_once("footer.html"); ?>
</footer>

<!-- Reajustes -->
<style>
 .agileinfo {
     margin-left: 75vw;
 }
 .Letras ul i[class="fa fa-cart-arrow-down"]:hover {
     cursor: unset;
 }
</style>

<!-- Abrir Submenus -->
 <script src="/whimcy/JS/SubMenus.js"></script>
 <script src="/whimcy/JS/minicart.js"></script>
 <script src="/whimcy/JS/StartCart.js"></script>
 <script src="/whimcy/JS/Assest/sessionManager.js"></script>
 <!-- Importar el Menu /PHP -->
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

		document.addEventListener("DOMContentLoaded", async () => {
			try {
				const response = await fetch("/whimcy/Views/Menu.php");
				if (!response.ok) throw new Error("Error al cargar Menu.php");

				const html = await response.text();
				document.querySelector(".header").innerHTML = html;
				
                //Desactivar boton del Menú
				disableCartBtn();
				// Activar scripts del menú
				if (typeof inicializarHeaderNav === "function") inicializarHeaderNav();
				if (typeof inicializarLogin === "function") inicializarLogin();
				setTimeout(() => {
					if (typeof StartCart === "function") StartCart();
				}, 200);

			} catch (err) {
				console.error(err);
			}
		});
	</script>

<!-- Redireccion -->
<script>
    function redirigirLogin(e) {

        if (window.matchMedia("(max-width: 400px)").matches) {
            e.preventDefault(); 
            window.location.href = "Mobile/Inicio.php";
        } else {
            window.location.href = "login.html";
        }
    }
</script>

</body>
</html>
