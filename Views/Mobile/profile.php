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
}

require_once($_SERVER['DOCUMENT_ROOT'] . '/whimcy/Controllers/Paths.php');
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/whimcy/Css/Estilos.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://kit.fontawesome.com/b59d19b6f4.js"></script>
    <title>Perfil</title>
</head>
<body>
    <div class="header">	</div>


    <footer class="inferior">  </footer>
    
    <!-- ================================================== --> 
    <!-- Importar el Menu -->
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