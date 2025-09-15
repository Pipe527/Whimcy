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
// Traer ruta 
 require_once($_SERVER['DOCUMENT_ROOT'] . '/whimcy/Controllers/Paths.php'); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="/whimcy/Css/Estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b59d19b6f4.js" crossorigin="anonymous" rel="stylesheet"></script>
</head>
<body>
<header>
    <div class="superior">
        <nav class="Letras">
            <ul class="Padres">
                <li class="nav-toggle-li">
                        <button id="menu-toggle" aria-expanded="false" aria-controls="primary-nav">
                            <i class="fa fa-bars"></i>
                        </button>
                    </li>
                <div><li><a href="" class="bton z">Menú</a></li></div>
                <li>
                    <span class="M1">
                        <ul class="active">
                            <li><a href="/whimcy/Views/products.php">Pedir</a></li>   
                            <li><a href="/whimcy/Views/products.php?category=Top" >Top</a></li>
                            <li>
                            <a href="#" class="combo">Combos<i class="fa-solid fa-caret-right OpenSub"></i></a>
                                <ul class="SubMenu">
                                    <li><a href="/whimcy/Views/products.php?category=combos" >Categorias</a></li>   
                                    <li><a href="#" >Definidos</a></li>
                                    <li><a href="#">Cartas</a></li>
                                </ul>
                            </li>
                            <li><a href="/whimcy/Views/Favoritos.php" >Favoritos</a></li>
                        </ul>
                    </span>
                </li>
                <div><li><a href="" class="z m">Promociones</a></li></div>
                <li>
                    <span class="M2">
                        <ul class="activo">
                            <li><a href="/whimcy/Views/offers.html" >Fechas</a></li>   
                            <li><a href="#" class="doble">Para <br>Año Nuevo</a></li>
                            <li><a href="#" class="doble">Ocaciones <br>Especiales</a></li>
                        </ul>
                    </span>
                </li>
                <li>	<div class="header-cart exp"> 
                    <div class="cart"> 
                        <form action="#" method="post" class="last"> 
                            <input type="hidden" name="cmd" value="_cart" />
                            <input type="hidden" name="display" value="1" />
                            <button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
                        </form>  
                    </div>
                    <div class="clearfix"> </div> 
                </div>   </li>
                <li><a href="/whimcy/Views/Index.html"><img src="/whimcy/images/Logotipo.png" class="Logo"></a></li>
                    <li><a href="" class="z us"><i class="fa-solid fa-user"></i></a></li>
                    <li>
                        <div class="Lgn">
                            <span class="actived" id="login-section">
                               
                        </div>
                        <div class="profile">
                            <span class="actived" id="profile-section">

                            </span>
                        </div>
                    </li>
                <div><li><a href="#" class="z r">Restaurantes</a></li></div>
                    <li>
                        <span class="M3">
                            <ul class="active">
                                <li><a href="#" class="links" data-section="Seccion1">Mapa</a></li>
                                <li><a href="#" class="links" data-section="Restaurante">Todos</a></li>   
                                <li><a href="#" class="links" data-section="Seccion01">Mi Zona</a></li>
                                <li><a href="#" class="links" data-section="Seccion2">Ubicación</a></li>
                                <li><a href="#" class="links" data-section="Seccion3">Reservación</a></li>
                            </ul>
                        </span>
                    </li>
                <div><li><a href="" class="z ad">Adicional</a></li></div>
                <li>
                    <span class="M4">
                        <ul class="activo">
                            <li><a href="#" class="doble">Facturas<br>Pendientes</a></li>   
                            <li><a href="/whimcy/Views/forums.html" >Comunidad</a></li>
                            <li><a href="#">Amigos</a></li>
                        </ul>
                    </span>
                </li>
            </ul>
        </nav>
    </div>
</header> 
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Abrir submenus -->
	<script src="/whimcy/JS/SubMenus.js"></script>
    <!-- Sesiones -->
    <script>
        var response = <?php echo json_encode($response); ?>;
        function inicializarLogin() {
            if (response.loggedIn) {
            console.log("Usuario logueado:", response.user);
            localStorage.setItem('loggedIn', true);
            localStorage.setItem('menuState', 'profile');

            document.getElementById('profile-section').innerHTML = `
                <ul>
                <li><a href="/whimcy/Views/Mobile/profile.php">${response.user}</a></li>
                <li><a href="/whimcy/Views/Mobile/profile.php#content-settings">Configuración</a></li>
                <li><a href="/whimcy/Controllers/Logout.php">Cerrar sesión</a></li>
                </ul>
            `;
            } else {
            console.log("Usuario no logueado");
            localStorage.setItem('loggedIn', false);
            localStorage.setItem('menuState', 'login');

            document.getElementById('login-section').innerHTML = `
                <span class="Login-title">
                <h3>Mi Cuenta</h3>
                </span>
                <form action="/whimcy/Controllers/LogIn.php" name="Login" method="post">
                <div class="input-dates">
                    <label for="Email">Correo:</label>
                    <input type="email" class="form-control" placeholder="Correo" name="Email" required>
                </div>
                <div class="input-dates">
                    <label for="Pass">Contraseña:</label>
                    <input type="password" class="form-control" placeholder="Contraseña" name="Pass" required>
                </div>
                <div class="Login-center">
                    <label for="Remember">
                    <input type="checkbox" class="form" name="Rem"> Recordarme
                    </label>
                    <a href="/whimcy/Views/PasswordA.php">Contraseña Olvidada</a>
                </div>
                <div class="Login-foot">
                    <span>
                    <button type="submit" class="btn-go">Conexión</button>
                    <h3>No tienes cuenta</h3>
                    <a href="/whimcy/Views/Registro.php"><button type="button" class="btn-sing">Registrarse</button></a>
                    </span>
                </div>
                </form>
            `;
            }
        }
    </script>
</body>
</html>
