<?php
session_start();

$response = array(
    'loggedIn' => false
);

if (isset($_SESSION['Nombre'])) {
    $response['loggedIn'] = true;
    $response['user'] = $_SESSION['Nombre'];
    $response['id'] = $_SESSION['idUsuarios'];
    $response['email'] = $_SESSION['Correo'];
    $response['alias'] = $_SESSION['Nickname'];
    $response['telefono'] = $_SESSION['Celular'];
    $response['address'] = $_SESSION['Dirección'];
}

echo "<script>console.log('SESSION response:', " . json_encode($response) . ");</script>";
require_once($_SERVER['DOCUMENT_ROOT'] . '/whimcy/Controllers/Paths.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/whimcy/Css/Estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://kit.fontawesome.com/b59d19b6f4.js"></script>
    <title>Perfil</title>
    <style>
        body {
            background-image: url("../../images/Fondo.gif");
            background-attachment: fixed;
            background-repeat: no-repeat;
        }
        :root {
            --footer-h: 967px;
        }
    </style>
</head>
<body>
    <div class="header">	</div>
    <div class="container py-5">
        <div class="row">
            <!-- Menú lateral -->
            <div class="col-md-3 mb-3">
            <div class="nav flex-column nav-pills" id="profile-tabs" role="tablist" aria-orientation="vertical">
                <button class="nav-link active" id="tab-profile" data-bs-toggle="pill" data-bs-target="#content-profile" type="button" role="tab">👤 Mi Perfil</button>
                <button class="nav-link" id="tab-orders" data-bs-toggle="pill" data-bs-target="#content-orders" type="button" role="tab">📦 Mis Pedidos</button>
                <button class="nav-link" id="tab-address" data-bs-toggle="pill" data-bs-target="#content-address" type="button" role="tab">🏠 Direcciones</button>
                <button class="nav-link" id="tab-payments" data-bs-toggle="pill" data-bs-target="#content-payments" type="button" role="tab">💳 Métodos de Pago</button>
                <button class="nav-link" id="tab-security" data-bs-toggle="pill" data-bs-target="#content-security" type="button" role="tab">🔒 Seguridad</button>
                <button class="nav-link" id="tab-notifications" data-bs-toggle="pill" data-bs-target="#content-notifications" type="button" role="tab">🔔 Notificaciones</button>
                <button class="nav-link" id="tab-settings" data-bs-toggle="pill" data-bs-target="#content-settings" type="button" role="tab">⚙️ Configuración</button>
            </div>
            </div>

            <!-- Contenido -->
            <div class="col-md-9">
            <div class="tab-content" id="profile-tabs-content">
                <div class="tab-pane fade show active" id="content-profile" role="tabpanel">
                <h3>👤 Mi Perfil</h3>
                <p>Bienvenido/a <?php echo ($response['user'])?> recuerda mantener tus datos actualizados.</p>
                <div class="profile-box">
                    <div id="cardB" class="card card-outline card-success">
                        <div class="card-body">
                            <form action="" class="edit-profile" id= "profileForm" method= "post">
                                <label class="inner-text"for="nickname">Tu Alias:</label>
                                <input type="text" class="form-control" name="Nickname" Value="<?php echo $response['alias'] ?>" disabled>
                                <label class="inner-text"for="correo">Tu Correo:</label>
                                <input type="text" class="form-control" name="Correo" Value="<?php echo $response['email'] ?>" disabled>
                                <label class="inner-text"for="phone">Tu Celular:</label>
                                <input type="text" class="form-control" name="Phone" Value="<?php echo $response['telefono'] ?>" disabled>
                                <label class="inner-text"for="direccion">Tu Dirección:</label>
                                <input type="text" class="form-control" name="Direccion" value="<?php echo $response['address']; ?>" disabled>
                                <p class="small text-muted mt-2">Haz click en editar para cambiar más datos</p>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-block">Editar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
                <div class="tab-pane fade" id="content-orders" role="tabpanel">
                <h3>📦 Mis Pedidos</h3>
                <p>Historial de compras y seguimiento de pedidos.</p>
                </div>
                <div class="tab-pane fade" id="content-address" role="tabpanel">
                <h3>🏠 Direcciones</h3>
                <p>Añadir, editar y eliminar direcciones de envío.</p>
                </div>
                <div class="tab-pane fade" id="content-payments" role="tabpanel">
                <h3>💳 Métodos de Pago</h3>
                <p>Tarjetas guardadas, PayPal, opciones de pago.</p>
                </div>
                <div class="tab-pane fade" id="content-security" role="tabpanel">
                <h3>🔒 Seguridad</h3>
                <p>¿Has olvidado tu contraseña? aquí puedes cambiarla</p>
                <div class="login-box">
                    <div class="card card-outline card-primary">
                        <div class="card-header text-center">
                        <b>Tastely</b>
                        </div>
                        <div class="card-body">
                        <p class="login-box-msg">Debe incluir letras y números. te confirmaremos el cambio de contraseña</p>
                        <form action="../../Controllers/NewPass.php" name="changepass" method="post">
                            <div class="input-group mb-3">
                            <input type="password" class="form-control" name="Pass2" id="pass" placeholder="Contraseña">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            </div>
                            <div class="input-group mb-3">
                            <input type="password" class="form-control" name="Confpass" id="Confpass" placeholder="Confirmar contraseña">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">Cambiar contraseña</button>
                            </div>
                            <!-- /.col -->
                            </div>
                        </form>

                        <!-- <p class="mt-3 mb-1">
                            <a href="../login.html">Iniciar sesion</a>
                        </p> -->
                    </div>
                </div>
            </div>
                </div>
                <div class="tab-pane fade" id="content-notifications" role="tabpanel">
                <h3>🔔 Notificaciones</h3>
                <p>Configura tus preferencias de notificación.</p>
                </div>
                <div class="tab-pane fade" id="content-settings" role="tabpanel">
                <h3>⚙️ Configuración</h3>
                <p>Idioma, moneda, preferencias generales.</p>
                </div>
            </div>
            </div>
        </div>
    </div>

   <!-- Reajustar estilos -->
    <style>
        .container {
            background-color: #fdfdfde8;
            padding-right: calc(2.5rem * .5);
            padding-left: calc(-.5 * -2.5rem);
        }
        .col-md-9 {
            background-color: #0eb170;
            border: 2px solid black;
            border-radius: 1em;
        }
        .col-md-3.mb-3 {
            background-color: #077770;
            border: 2px solid black;
            border-radius: 1em;
        }
        .form-control {
            color: #bdeeda;
        }
        .form-users {
            background-color: #bdeeda;
        }
        .form-control:disabled {
            background-color: #113910;
            border-color: black;
            opacity: 1;
        }
        .btn:hover {
            color: #bdeeda;
        }
        button.btn-block {
            margin-left: 1em;
        }
        button.btn-flex {
            margin-left: 9em;
        }
        button.btn-block, button.btn-flex {
            margin-top: 1em;
        }
        .card {
            --bs-body-bg: #005e57;
        }
        .input-group.mb-3 input {
            background-color: #bdeeda;
        }
        .inner-text {
            color: rgba(167, 210, 174, 0.75) !important;
        }
        .inner-title {
          margin-left: .5em;
        }
        .text-muted, .login-box-msg {
            --bs-text-opacity: 1;
            color: rgba(167, 210, 174, 0.75) !important;
        }
        .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
            color: #2cfb2a;
            background-color: #04413d;
        }
        .nav-link {
            color: #fff;
            padding: 1em var(--bs-nav-link-padding-x);
        }
        .nav-link:focus, .nav-link:hover {
            color: #4cff49ff;
        }
        ol, ul {
            padding-left: initial;
        }
        #profile-tabs-content {
            padding: .5em;
        }
    </style>
    <footer class="inferior">  </footer>
    <!-- ================================================== -->
    <!-- Formulario deslizante -->
    <script src="../../JS/FormAnimation.js"></script> 
    <!-- Importar el Menu / PHP -->
    <script>
        const base = "<?= $base ?>"; // siempre disponible desde PHP

        $(document).ready(function () {
            $('.header').load(base + '/Views/Menu.php', function (response, status, xhr) {
                // Ejecutar los <script> que vinieron en Menu.php
                $(this).find("script").each(function(){
                    $.globalEval(this.text || this.textContent || this.innerHTML || "");
                });

                if (typeof inicializarLogin === "function") inicializarLogin();
                $.getScript(base + "/JS/SubMenus.js", function () {
                    if (typeof inicializarHeaderNav === "function") inicializarHeaderNav();
                });
                $.getScript(base + "/JS/minicart.js", function () {
                    if (typeof w3ls !== "undefined") {
                        w3ls.render();
                        w3ls.cart.on('w3sb_checkout', function (evt) {
                            if (this.subtotal() > 0) {
                                const items = this.items();
                                for (let i = 0; i < items.length; i++) {
                                    items[i].set('shipping', 0);
                                    items[i].set('shipping2', 0);
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>
    <!-- importar el footer -->
     <script>
        $('.inferior').load('/whimcy/Views/Footer.html', function() {
            fetch('/whimcy/Controllers/CheckSesion.php')
            .then(res => res.json())
            .then(response => {
            console.log("Sesión:", response);
            if (response.loggedIn) {
                document.querySelectorAll('a[href="login.html"]').forEach(link => {
                    link.addEventListener("click", e => {
                        e.preventDefault();
                        window.location.href = "/whimcy/Views/Mobile/profile.php";
                    });
                });
            }
        })
        .catch(err => console.error("Error verificando sesión:", err));
    });
     </script>
</body>
</html>